<?php

namespace App\Http\Controllers;

use App\Models\Desa;
use App\Models\Kecamatan;
use Illuminate\Http\Request;

class DesaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $jumlahDesa = Desa::count('nama_desa');
        $desas = Desa::when($request->input('nama_desa'), function ($query, $name) {
            return $query->where('nama_desa', 'like', '%' . $name . '%');
        })
            ->orderBy('id', 'asc')
            ->paginate(10);

        return view('pages.desa.index',  compact('jumlahDesa', 'desas'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        $kecs = Kecamatan::all();
        $desas = Desa::all();

        return view('pages.desa.create', compact('kecs', 'desas'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Desa $desa)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $desa = Desa::findOrFail($id);
        $kecs = Kecamatan::all();

        return view('pages.desa.edit', compact('desa', 'kecs'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $desa = Desa::findOrFail($id);

        $desa->update([
            'kecamatan_id' => $request->kecamatan_id,
            'nama_desa' => $request->nama_desa,
        ]);

        return redirect()->route('desa.index')->with('success', 'Desa/Kelurahan berhasil diupdate');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Desa $desa)
    {
        //
    }
}
