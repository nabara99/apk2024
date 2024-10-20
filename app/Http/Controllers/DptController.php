<?php

namespace App\Http\Controllers;

use App\Models\Dpt;
use Illuminate\Http\Request;

class DptController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $jumlah_dpt = Dpt::count('id');
        $dpts = Dpt::when($request->input('nama'), function ($query, $value) {
            return $query->where('nama', 'like', '%' . $value . '%')
                ->orWhere('nik', 'like', '%' . $value . '%');
        })
            ->orderBy('id', 'asc')
            ->paginate(10);

        return view('pages.dpt.index', compact('dpts', 'jumlah_dpt'));
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
    public function show(Dpt $dpt)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Dpt $dpt)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Dpt $dpt)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Dpt $dpt)
    {
        //
    }
}
