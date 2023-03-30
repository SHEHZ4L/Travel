<?php

namespace App\Http\Controllers;

use App\Models\Mitra;
use App\Http\Requests\StoreMitraRequest;
use App\Http\Requests\UpdateMitraRequest;

class MitraController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $mitra = Mitra::all();
        return view('mitra/view',
            [
                'mitra' => $mitra
            ]
        );
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('mitra/create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreMitraRequest $request)
    {
        $validated = $request->validate([
            'nama_mitra' => 'required',
            'jenis_mitra' => 'required',
            'alamat_mitra' => 'required',
            'surat_perjanjian' => 'required',
        ]);

        Mitra::create($request->all());
        return redirect()->route('mitra.index')->with('success','Data Berhasil di Input');
    }

    /**
     * Display the specified resource.
     */
    public function show(Mitra $mitra)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Mitra $mitra)
    {
        return view('mitra.edit', compact('mitra'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateMitraRequest $request, Mitra $mitra)
    {
        $validated = $request->validate([
            'nama_mitra' => 'required',
            'jenis_mitra' => 'required',
            'alamat_mitra' => 'required',
            'surat_perjanjian' => 'required',
        ]);

        $mitra->update($validated);
    
        return redirect()->route('mitra.index')->with('success','Data Berhasil di Ubah');;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $mitra = Mitra::findOrFail($id);
        $mitra->delete();

        return redirect()->route('mitra.index')->with('success','Data Berhasil di Hapus');
    }
}