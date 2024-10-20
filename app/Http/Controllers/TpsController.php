<?php

namespace App\Http\Controllers;

use App\Models\Tps;
use Illuminate\Http\Request;

class TpsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

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
    public function show(Tps $tps)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $tps = Tps::findOrFail($id);

        return view('pages.tps.edit', compact('tps'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'absen' => 'required|file|mimes:pdf|max:2048',
        ]);

        $tps = Tps::find($id);

        if($request->hasFile('absen')){
            $absen = $request->file('absen');
            $filename = $tps->id . '.' . $absen->getClientOriginalExtension();
            $absen->storeAs('public/absen', $filename);
            $tps->absen = 'storage/absen/' . $filename;
        }

        $tps->save();

        return redirect()->route('dpttps.index')->with('success', 'Absen berhasil diupload');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Tps $tps)
    {
        //
    }
}
