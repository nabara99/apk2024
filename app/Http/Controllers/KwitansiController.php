<?php

namespace App\Http\Controllers;

use App\Models\Anggaran;
use App\Models\Kwitansi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class KwitansiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('pages.kwitansi.index');
    }

    public function create()
    {
        $data = new Kwitansi();
        $data->kw_id = $this->generateKwitansiNumber();
        $anggarans = Anggaran::all();

        return view('pages.kwitansi.create', compact('data', 'anggarans'));
    }

    private function generateKwitansiNumber()
    {
        $lastFaktur = Kwitansi::latest()->first();
        $nextNumber = $lastFaktur ? (int)substr($lastFaktur->kw_id, 3) + 1 : 1;
        return $nextNumber . '/KTK/2024';
    }

    public function modalcaripagu()
    {
        $anggarans = DB::table('anggarans')
            ->join('subs', 'anggarans.sub_id', '=', 'subs.id')
            ->join('rekenings', 'anggarans.rekening_id', '=', 'rekenings.id')
            ->join('kegiatans', 'subs.kegiatan_id', '=', 'kegiatans.id')
            ->join('programs', 'kegiatans.program_id', '=', 'programs.id')
            ->selectRaw('anggarans.id, sisa_pagu,nama_sub, kode_sub, kode_kegiatan, kode_program, uraian, kode_rekening')
            ->get();

        return response()->json(['data' => $anggarans]);
    }

    

    public function store(Request $request)
    {
        //
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
    public function destroy(string $id)
    {
        //
    }
}
