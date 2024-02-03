<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class LaporanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $realisasiBelanja = DB::table('temp_kwitansis')
            ->join('kwitansis', 'temp_kwitansis.kwitansi_id', '=', 'kwitansis.kw_id')
            ->join('anggarans', 'temp_kwitansis.anggaran_id', '=', 'anggarans.id')
            ->join('rekenings', 'anggarans.rekening_id', '=', 'rekenings.id')
            ->join('subs', 'anggarans.sub_id', '=', 'subs.id')
            ->join('kegiatans', 'subs.kegiatan_id', '=', 'kegiatans.id')
            ->join('programs', 'kegiatans.program_id', '=', 'programs.id')
            ->select(DB::raw('MONTH(tgl) as bulan, YEAR(tgl) as tahun, total, kode_rekening, nama_rekening, kode_sub, nama_sub, uraian, kode_program, kode_kegiatan'))
            ->groupBy(DB::raw('MONTH(tgl), YEAR(tgl), total, kode_rekening, nama_rekening, kode_sub, nama_sub, uraian, kode_program, kode_kegiatan'))
            ->get()
            ->groupBy('kode_sub');

        return view('pages.laporan.lapbendahara', compact('realisasiBelanja'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
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
