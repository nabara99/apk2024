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
            ->select(
                'nama_sub',
                'kode_rekening',
                'nama_rekening',
                DB::raw('SUM(CASE WHEN MONTH(tgl) = 1 THEN total ELSE 0 END) AS januari_total'),
                DB::raw('SUM(CASE WHEN MONTH(tgl) = 2 THEN total ELSE 0 END) AS februari_total'),
                DB::raw('SUM(CASE WHEN MONTH(tgl) = 3 THEN total ELSE 0 END) AS maret_total'),
                DB::raw('SUM(CASE WHEN MONTH(tgl) = 4 THEN total ELSE 0 END) AS april_total'),
                DB::raw('SUM(CASE WHEN MONTH(tgl) = 5 THEN total ELSE 0 END) AS mei_total'),
                DB::raw('SUM(CASE WHEN MONTH(tgl) = 6 THEN total ELSE 0 END) AS juni_total'),
                DB::raw('SUM(CASE WHEN MONTH(tgl) = 7 THEN total ELSE 0 END) AS juli_total'),
                DB::raw('SUM(CASE WHEN MONTH(tgl) = 8 THEN total ELSE 0 END) AS agustus_total'),
                DB::raw('SUM(CASE WHEN MONTH(tgl) = 9 THEN total ELSE 0 END) AS september_total'),
                DB::raw('SUM(CASE WHEN MONTH(tgl) = 10 THEN total ELSE 0 END) AS oktober_total'),
                DB::raw('SUM(CASE WHEN MONTH(tgl) = 11 THEN total ELSE 0 END) AS november_total'),
                DB::raw('SUM(CASE WHEN MONTH(tgl) = 12 THEN total ELSE 0 END) AS desember_total')
            )
            ->groupBy('kode_rekening', 'nama_rekening', 'nama_sub')
            ->get();

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
