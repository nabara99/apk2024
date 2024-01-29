<?php

namespace App\Http\Controllers;

use App\Models\Kwitansi;
use App\Models\PajakDaerah;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class PajakDaerahController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('pages.pajakdaerah.index');
    }


    public function create()
    {
    }

    /**
     * Show the form for creating a new resource.
     */

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // try {
        //     // Dapatkan semua kwitansi yang memiliki pajak daerah
        //     $kwitansiDenganPajakDaerah = Kwitansi::where('pajakdaerah', '>', 0)->get();

        //     // Loop melalui setiap kwitansi dan buat entri pajak daerah
        //     foreach ($kwitansiDenganPajakDaerah as $kwitansi) {
        //         $pajakDaerah = new PajakDaerah([
        //             'kwitan_id' => $kwitansi->kw_id,
        //             // Masukkan nilai lain sesuai kebutuhan
        //         ]);

        //         $pajakDaerah->save();
        //     }

        //     return response()->json(['message' => 'Pajak Daerah berhasil di-generate'], 200);
        // } catch (\Exception $e) {
        //     return response()->json(['message' => 'Terjadi kesalahan saat meng-generate Pajak Daerah'], 500);
        // }
    }

    public function generatePajakDaerah(Request $request)
    {
        try {
            // Ambil semua kwitansi yang memiliki pajak daerah
            $kwitansiDenganPajakDaerah = Kwitansi::where('pajakdaerah', '>', 0)->get();

            // Loop melalui setiap kwitansi dan buat entri pajak daerah
            foreach ($kwitansiDenganPajakDaerah as $kwitansi) {
                $pajakDaerah = new PajakDaerah([
                    'kwitan_id' => $kwitansi->kw_id,
                    // Masukkan nilai lain sesuai kebutuhan
                ]);

                $pajakDaerah->save();
            }

            return redirect()->back()->with('success', 'Pajak Daerah berhasil di-generate');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Terjadi kesalahan saat meng-generate Pajak Daerah');
        }

        return redirect()->route('kwitansi.index')->with('success', 'Pajak Daerah berhasil di-generate');
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
