<?php

namespace App\Http\Controllers;

use App\Models\Pelanggan;
use App\Http\Requests\StorePelangganRequest;
use App\Http\Requests\UpdatePelangganRequest;

class PelangganController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pelanggan = Pelanggan::all();
        return view('pelanggan/view',
            [
                'pelanggan' => $pelanggan
            ]
        );
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pelanggan/create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePelangganRequest $request)
    {
        $validated = $request->validate([
            'email_pelanggan' => 'required',
            'nama_pelanggan' => 'required',
            'alamat_pelanggan' => 'required',
            'nomor_hp' => 'required',
        ]);

        Pelanggan::create($request->all());
        return redirect()->route('pelanggan.index')->with('success','Data Berhasil di Input');
    }

    /**
     * Display the specified resource.
     */
    public function show(Pelanggan $pelanggan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Pelanggan $pelanggan)
    {
        return view('pelanggan.edit', compact('pelanggan'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePelangganRequest $request, Pelanggan $pelanggan)
    {
        $validated = $request->validate([
            'email_pelanggan' => 'required',
            'nama_pelanggan' => 'required',
            'alamat_pelanggan' => 'required',
            'nomor_hp' => 'required',
        ]);

        $pelanggan->update($validated);
    
        return redirect()->route('pelanggan.index')->with('success','Data Berhasil di Ubah');;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $pelanggan = Pelanggan::findOrFail($id);
        $pelanggan->delete();

        return redirect()->route('pelanggan.index')->with('success','Data Berhasil di Hapus');
    }
}