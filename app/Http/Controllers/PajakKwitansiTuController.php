<?php

namespace App\Http\Controllers;

use App\Models\PajakKwitansi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PajakKwitansiTuController extends Controller
{
    public function store(Request $request)
    {
        $data = PajakKwitansi::create([
            'spd_id' => $request->input('spd_id'),
            'kwitu_id' => $request->input('kwi_id'),
            'uraian_pajak' => $request->input('uraian_pajak'),
            'jenis_pajak' => $request->input('jenis_pajak'),
            'billing' => $request->input('billing'),
            'ntpn' => $request->input('ntpn'),
            'tgl_setor' => $request->input('tgl_setor'),
            'ntb' => $request->input('ntb'),
            'nilai_pajak' => str_replace(",", "", $request->input('nilai_pajak')),
        ]);

        $data = PajakKwitansi::find($request->input('kwitu_id'));
        return response()->json(['message' => 'Data berhasil disimpan', 'data' => $data], 200);
    }

    public function show($kwi_id)
    {
        $pajakKwitansi = DB::table('pajak_kwitansis')
            ->where('kwitu_id', $kwi_id)
            ->get();

        return response()->json(['pajakKwitansi' => $pajakKwitansi]);
    }
}
