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
        return view('pages.laporan.index');
    }

    public function laporanBendahara(Request $request)
    {
        $startDate = $request->input('start_date');
        $endDate = $request->input('end_date');

        $startDate = $request->input('start_date');
        $endDate = $request->input('end_date');

        $realisasiBelanja = DB::table('temp_kwitansis')
            ->join('kwitansis', 'temp_kwitansis.kwitansi_id', '=', 'kwitansis.kw_id')
            ->join('anggarans', 'temp_kwitansis.anggaran_id', '=', 'anggarans.id')
            ->join('rekenings', 'anggarans.rekening_id', '=', 'rekenings.id')
            ->join('subs', 'anggarans.sub_id', '=', 'subs.id')
            ->join('kegiatans', 'subs.kegiatan_id', '=', 'kegiatans.id')
            ->join('programs', 'kegiatans.program_id', '=', 'programs.id')
            ->select(
                'kode_program',
                'kode_kegiatan',
                'kode_sub',
                'nama_sub',
                'kode_rekening',
                'nama_rekening',
                DB::raw('SUM(total) AS total_realisasi') // Hitung total realisasi
            )
            ->whereBetween('tgl', [$startDate, $endDate])
            ->groupBy('kode_program', 'kode_kegiatan', 'kode_sub', 'kode_rekening', 'nama_sub', 'nama_rekening')
            ->get();

        return view('pages.laporan.laporan_bendahara', [
            'realisasiBelanja' => $realisasiBelanja,
            'startDate' => $startDate,
            'endDate' => $endDate
        ]);
    }

    public function laporanRealisasi()
    {
        $realisasiBelanja = DB::table('temp_kwitansis')
            ->join('kwitansis', 'temp_kwitansis.kwitansi_id', '=', 'kwitansis.kw_id')
            ->join('anggarans', 'temp_kwitansis.anggaran_id', '=', 'anggarans.id')
            ->join('rekenings', 'anggarans.rekening_id', '=', 'rekenings.id')
            ->join('subs', 'anggarans.sub_id', '=', 'subs.id')
            ->join('kegiatans', 'subs.kegiatan_id', '=', 'kegiatans.id')
            ->join('programs', 'kegiatans.program_id', '=', 'programs.id')
            ->select(
                'kode_program',
                'kode_kegiatan',
                'kode_sub',
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
            ->groupBy('kode_program', 'kode_kegiatan', 'kode_sub', 'kode_rekening', 'nama_rekening', 'nama_sub')
            ->orderBy('kode_program', 'asc')
            ->orderBy('kode_kegiatan', 'asc')
            ->orderBy('kode_sub', 'asc')
            ->orderBy('kode_rekening', 'asc')
            ->get();

        // Menghitung total per bulan
        $totalJanuari = 0;
        $totalFebruari = 0;
        $totalMaret = 0;
        $totalApril = 0;
        $totalMei = 0;
        $totalJuni = 0;
        $totalJuli = 0;
        $totalAgustus = 0;
        $totalSeptember = 0;
        $totalOktober = 0;
        $totalNovember = 0;
        $totalDesember = 0;

        foreach ($realisasiBelanja as $realisasi) {
            $totalJanuari += $realisasi->januari_total;
            $totalFebruari += $realisasi->februari_total;
            $totalMaret += $realisasi->maret_total;
            $totalApril += $realisasi->april_total;
            $totalMei += $realisasi->mei_total;
            $totalJuni += $realisasi->juni_total;
            $totalJuli += $realisasi->juli_total;
            $totalAgustus += $realisasi->agustus_total;
            $totalSeptember += $realisasi->september_total;
            $totalOktober += $realisasi->oktober_total;
            $totalNovember += $realisasi->november_total;
            $totalDesember += $realisasi->desember_total;
        }

        return view('pages.laporan.lapbendahara', compact('realisasiBelanja', 'totalJanuari', 'totalFebruari', 'totalMaret', 'totalApril', 'totalMei', 'totalJuni', 'totalJuli', 'totalAgustus', 'totalSeptember', 'totalOktober', 'totalNovember', 'totalDesember',));
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
