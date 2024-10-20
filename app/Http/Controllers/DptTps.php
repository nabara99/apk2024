<?php

namespace App\Http\Controllers;

use App\Models\Dpt;
use App\Models\Tps;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DptTps extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $user = Auth::user();
        $tps_id = $user->tps_id;

        $tps = $user->tps;

        $jumlah_dpt = Dpt::where('tps_id', $tps_id)->count('id');

        $dpts = Dpt::with(['tps.desa.kecamatan'])
            ->where('tps_id', $tps_id)
            ->whereHas('tps')
            ->when($request->input('nama'), function ($query, $keyword) {
                return $query->where('nama', 'like', '%' . $keyword . '%')
                    ->orWhere('nik', 'like', '%' . $keyword . '%');
            })
            ->orderBy('id', 'asc')
            ->paginate(10);

        return view('pages.dpttps.index', compact('dpts', 'jumlah_dpt', 'tps'));
    }

    public function updateStatus($id)
    {
        $dpt = Dpt::find($id);

        if (!$dpt) {
            return response()->json(['success' => false, 'message' => 'Data tidak ditemukan.']);
        }

        $dpt->hadir = !$dpt->hadir;
        $dpt->save();

        return response()->json(['success' => true, 'new_status' => $dpt->hadir]);
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $tps_list = Tps::all();

        return view('pages.dpttps.create', compact('tps_list'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'no_kk' => 'required|max:16',
            'nik' => 'required|unique:dpts|max:16',
            'nama' => 'required|string|max:255',
            'tl' => 'required|string',
            'tgl_lahir' => 'required|date',
            'status' => 'required',
            'jenkel' => 'required',
            'alamat' => 'required|string',
            'rt' => 'required|string|max:3',
            'rw' => 'required|string|max:3',
        ]);

        $dpt = new Dpt();
        $dpt->no_kk = $request->no_kk;
        $dpt->nik = $request->nik;
        $dpt->nama = $request->nama;
        $dpt->tl = $request->tl;
        $dpt->tgl_lahir = $request->tgl_lahir;
        $dpt->status = $request->status;
        $dpt->jenkel = $request->jenkel;
        $dpt->alamat = $request->alamat;
        $dpt->rt = $request->rt;
        $dpt->rw = $request->rw;

        $dpt->tps_id = Auth::user()->tps_id;
        $dpt->memilih = 0;

        $dpt->save();

        return redirect()->route('dpttps.index')->with('success', 'DPT berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(Dpt $dpt)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Dpt $dpt)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Dpt $dpt)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Dpt $dpt)
    {
        //
    }
}
