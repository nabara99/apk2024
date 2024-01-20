<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreSpdRequest;
use App\Models\Spd;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SpdController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $spds = DB::table('spds')
            ->when($request->input('spd_uraian'), function ($query, $name) {
                return $query->where('spd_uraian', 'like', '%' . $name . '%');
            })
            ->orderBy('id', 'asc')
            ->paginate(10);
        return view('pages.spd.index', compact('spds'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pages.spd.create');
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreSpdRequest $request)
    {
        $spd = new Spd();
        $spd->no_spd = $request->no_spd;
        $spd->spd_tgl = $request->spd_tgl;
        $spd->spd_uraian = $request->spd_uraian;
        $spd->spd_nilai = (int) $request->spd_nilai;
        $spd->spd_sisa = (int) $request->spd_nilai;
        $spd->iwp1 = $request->iwp1;
        $spd->iwp8 = $request->iwp8;
        $spd->pph21 = $request->pph21;
        $spd->pph22 = $request->pph22;
        $spd->pph23 = $request->pph23;
        $spd->ppn = $request->ppn;

        $spd->save();
        return redirect()->route('spd.index')->with('success', 'SP2D berhasil disimpan');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Spd $spd)
    {
        $spd->delete();
        return redirect()->route('spd.index')->with('success', 'SP2D telah dihapus');
    }
}
