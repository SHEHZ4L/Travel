<?php

namespace App\Http\Controllers;

use App\Models\Daerah;
use App\Http\Requests\StoreDaerahRequest;
use App\Http\Requests\UpdateDaerahRequest;

class DaerahController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $daerah = Daerah::all();
        return view('daerah/view',
            [
                'daerah' => $daerah      
            ]
        );
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('daerah/create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreDaerahRequest $request)
    {
        $validated = $request->validate([
            'nama_daerah' => 'required',
            'jumlah_penginapan' => 'required',
            'jumlah_kendaraan' => 'required',
            'destinasi_favorit' => 'required',
        ]);

        Daerah::create($request->all());
        return redirect()->route('daerah.index')->with('success','Data Berhasil di Input');
    }

    /**
     * Display the specified resource.
     */
    public function show(Daerah $daerah)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Daerah $daerah)
    {
        return view('daerah.edit', compact('daerah'));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateDaerahRequest $request, Daerah $daerah)
    {
        $validated = $request->validate([
            'nama_daerah' => 'required',
            'jumlah_penginapan' => 'required',
            'jumlah_kendaraan' => 'required',
            'destinasi_favorit' => 'required',
        ]);

        $daerah->update($validated);
    
        return redirect()->route('daerah.index')->with('success','Data Berhasil di Ubah');;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $daerah = Daerah::findOrFail($id);
        $daerah->delete();

        return redirect()->route('daerah.index')->with('success','Data Berhasil di Hapus');
    }
}