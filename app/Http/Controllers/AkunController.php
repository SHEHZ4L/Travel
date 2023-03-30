<?php

namespace App\Http\Controllers;

use App\Models\Akun;
use App\Http\Requests\StoreAkunRequest;
use App\Http\Requests\UpdateAkunRequest;

class AkunController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $akun = Akun::all();
        return view('akun/view',
            [
                'akun' => $akun
            ]
        );
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('akun/create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreAkunRequest $request)
    {
        $validated = $request->validate([
            'nama_akun' => 'required',
            'header_akun' => 'required',
            'kode_akun' => 'required',
        ]);

        Akun::create($request->all());
        return redirect()->route('akun.index')->with('success','Data Berhasil di Input');
    }

    /**
     * Display the specified resource.
     */
    public function show(Akun $akun)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Akun $akun)
    {
        return view('akun.edit', compact('akun'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateAkunRequest $request, Akun $akun)
    {
        $validated = $request->validate([
            'nama_akun' => 'required',
            'kode_akun' => 'required',
            'header_akun' => 'required',
        ]);

        $akun->update($validated);
    
        return redirect()->route('akun.index')->with('success','Data Berhasil di Ubah');;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $akun = Akun::findOrFail($id);
        $akun->delete();

        return redirect()->route('akun.index')->with('success','Data Berhasil di Hapus');
    }
}