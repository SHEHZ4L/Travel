<?php

namespace App\Http\Controllers;

use App\Models\Paket;
use App\Http\Requests\StorePaketRequest;
use App\Http\Requests\UpdatePaketRequest;

class PaketController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $paket = Paket::all();
        return view('paket/view',
            [
                'paket' => $paket
            ]
        );
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('paket/create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePaketRequest $request)
    {
        $validated = $request->validate([
            'nama_paket' => 'required',
            'daerah_wisata' => 'required',
            'harga_paket' => 'required',
        ]);

        Paket::create($request->all());
        return redirect()->route('paket.index')->with('success','Data Berhasil di Input');
    }

    /**
     * Display the specified resource.
     */
    public function show(Paket $paket)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Paket $paket)
    {
        return view('paket.edit', compact('paket'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePaketRequest $request, Paket $paket)
    {
        $validated = $request->validate([
            'nama_paket' => 'required',
            'daerah_wisata' => 'required',
            'harga_paket' => 'required',
        ]);

        $paket->update($validated);
    
        return redirect()->route('paket.index')->with('success','Data Berhasil di Ubah');;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $paket = Paket::findOrFail($id);
        $paket->delete();

        return redirect()->route('paket.index')->with('success','Data Berhasil di Hapus');
    }
}