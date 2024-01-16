<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreAnggaranRequest;
use App\Models\Anggaran;
use App\Models\Rekening;
use App\Models\Sub;
use Illuminate\Http\Request;

class AnggaranController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $anggarans = Anggaran::when($request->input('uraian'), function ($query, $name) {
            return $query->where('uraian', 'like', '%' . $name . '%');
        })
            ->orderBy('id', 'asc')
            ->paginate(10);
        return view('pages.anggaran.index', compact('anggarans'));
    }

    /**
     * Show the form for creating a new resource.
     */

    public function create(Request $request)
    {
        $subs = Sub::all();
        $rekenings = Rekening::all();
        return view('pages.anggaran.create', compact('subs', 'rekenings'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreAnggaranRequest $request)
    {
        $data = $request->all();
        Anggaran::create($data);
        return redirect()->route('anggaran.index')->with('success', 'Anggaran berhasil disimpan');
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
    public function edit($id)
    {
        $anggaran = Anggaran::findOrFail($id);
        $subs = Sub::all();
        $rekenings = Rekening::all();
        return view('pages.anggaran.edit', compact('anggaran', 'subs', 'rekenings'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $anggaran = Anggaran::findOrFail($id);
        $anggaran->update($request->all());

        return redirect()->route('anggaran.index')->with('success', 'Anggaran berhasil diupdate');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Anggaran $anggaran)
    {
        $anggaran->delete();
        return redirect()->route('anggaran.index')->with('success', 'Anggaran berhasil dihapus');
    }
}
