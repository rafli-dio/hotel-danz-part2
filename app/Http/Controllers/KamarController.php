<?php

namespace App\Http\Controllers;
use App\Models\Kamar;
use App\Models\TipeKamar;
use Illuminate\Http\Request;

class KamarController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tipekamar = TipeKamar::all();
        $kamar = Kamar::with('tipeKamar')->get();
        return view('layouts-admin.pages.kamar.index',compact('kamar','tipekamar'));
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
            'nomor_kamar' => 'required|string|max:50|unique:kamars,nomor_kamar',
            'tipe_kamar_id' => 'required|exists:tipe_kamars,id',
            'status_tersedia' => 'nullable|boolean', 
        ]);

        $statusTersedia = $request->has('status_tersedia') ? $request->status_tersedia : true;

        $kamar = Kamar::create([
            'nomor_kamar' => $request->nomor_kamar,
            'tipe_kamar_id' => $request->tipe_kamar_id,
            'status_tersedia' => $statusTersedia,
        ]);
        
        return redirect()->route('get-kamar');
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
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
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
            'nomor_kamar' => 'required|string|max:50|unique:kamars,nomor_kamar,' . $id,
            'tipe_kamar_id' => 'required|exists:tipe_kamars,id',
            'status_tersedia' => 'nullable|boolean',
        ]);
    
        $kamar = Kamar::findOrFail($id); 
        $kamar->nomor_kamar = $request->nomor_kamar;
        $kamar->tipe_kamar_id = $request->tipe_kamar_id;
        $kamar->status_tersedia = $request->has('status_tersedia') ? $request->status_tersedia : true;
        $kamar->save();
    
        return redirect()->route('get-kamar');
    }
    

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $kamar = Kamar::findOrFail($id);
        $kamar->delete();
        return redirect()->route('get-kamar');
    }
}
