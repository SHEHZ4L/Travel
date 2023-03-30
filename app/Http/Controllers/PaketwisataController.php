<?php

namespace App\Http\Controllers;

use App\Models\Paketwisata;
use App\Http\Requests\StorePaketwisataRequest;
use App\Http\Requests\UpdatePaketwisataRequest;

class PaketwisataController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $paketwisata = Paketwisata::all();
        return view('paketwisata/view',
            [
                'paketwisata' => $paketwisata
            ]
        );
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('paketwisata/create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePaketwisataRequest $request)
    {
        $validated = $request->validate([
            'nama_paket' => 'required',
            'daerah_wisata' => 'required',
            'harga_paket' => 'required',
        ]);

        Paketwisata::create($request->all());
        return redirect()->route('paketwisata.index')->with('success','Data Berhasil di Input');
    }

    /**
     * Display the specified resource.
     */
    public function show(Paketwisata $paketwisata)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Paketwisata $paketwisata)
    {
        return view('paketwisata.edit', compact('paketwisata'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePaketwisataRequest $request, Paketwisata $paketwisata)
    {
        $validated = $request->validate([
            'nama_paket' => 'required',
            'daerah_wisata' => 'required',
            'harga_paket' => 'required',
        ]);

        $paketwisata->update($validated);
    
        return redirect()->route('paketwisata.index')->with('success','Data Berhasil di Ubah');;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $paketwisata = Paketwisata::findOrFail($id);
        $paketwisata->delete();

        return redirect()->route('paketwisata.index')->with('success','Data Berhasil di Hapus');
    }
}