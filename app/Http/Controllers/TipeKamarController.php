<?php

namespace App\Http\Controllers;
use App\Models\TipeKamar;
use Illuminate\Http\Request;

class TipeKamarController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tipekamar = TipeKamar::all();
        return view('layouts-admin.pages.tipekamar.index',compact('tipekamar'));
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama_tipe_kamar' => 'required|string|max:255',
            'harga_kamar' => 'required|numeric',
            'deskripsi_kamar' => 'required|string',
            'gambar_kamar' => 'required|image|mimes:jpg,png,jpeg|max:2048',
        ]);
    
        $gambarPath = $request->file('gambar_kamar')->store('images/tipe-kamar', 'public');
    
        TipeKamar::create([
            'nama_tipe_kamar' => $request->nama_tipe_kamar,
            'harga_kamar' => $request->harga_kamar,
            'deskripsi_kamar' => $request->deskripsi_kamar,
            'gambar_kamar' => $gambarPath,
        ]);
    
        return redirect()->route('get-tipe-kamar');
    }
    

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_tipe_kamar' => 'required|string|max:255',
            'harga_kamar' => 'required|numeric',
            'deskripsi_kamar' => 'required|string',
            'gambar_kamar' => 'nullable|image|mimes:jpg,png,jpeg|max:2048',
        ]);

        $tipekamar = TipeKamar::findOrFail($id);

        $tipekamar->nama_tipe_kamar = $request->nama_tipe_kamar;
        $tipekamar->harga_kamar = $request->harga_kamar;
        $tipekamar->deskripsi_kamar = $request->deskripsi_kamar;

        if ($request->hasFile('gambar_kamar')) {
            if ($tipekamar->gambar_kamar && file_exists(storage_path('app/public/' . $tipekamar->gambar_kamar))) {
                unlink(storage_path('app/public/' . $tipekamar->gambar_kamar));
            }

            // Simpan gambar baru
            $gambarPath = $request->file('gambar_kamar')->store('images/tipekamar', 'public');
            $tipekamar->gambar_kamar = $gambarPath;
        }

        $tipekamar->save();

        return redirect()->route('get-tipe-kamar');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            $tipekamar = TipeKamar::findOrFail($id);
            if ($tipekamar->gambar_kamar && file_exists(storage_path('app/public/' . $tipekamar->gambar_kamar))) {
                unlink(storage_path('app/public/' . $tipekamar->gambar_kamar));
            }
            $tipekamar->delete();
            return redirect()->route('get-tipe-kamar');
        } catch (\Exception $e) {
            return redirect()->route('get-tipe-kamar');
        }
    }

}
