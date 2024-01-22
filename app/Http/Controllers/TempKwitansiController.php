<?php

namespace App\Http\Controllers;

use App\Models\Anggaran;
use App\Models\TempKwitansi;
use Illuminate\Http\Request;

class TempKwitansiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $faktur = $request->input('faktur');

        
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
        $anggaran = Anggaran::find($request->input('anggaran_id'));

        if ($anggaran && $anggaran->sisa_pagu < str_replace(",", "", $request->input('total'))) {
            return response()->json(['message' => 'Saldo tidak cukup !'], 422);
        } else {
            $data = TempKwitansi::create([
                'kwitansi_id' => $request->input('kwitansi_id'),
                'anggaran_id' => $request->input('anggaran_id'),
                'total' => str_replace(",", "", $request->input('total')),
            ]);
            return response()->json(['message' => 'Data berhasil disimpan', 'data' => $data], 200);
        }
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
