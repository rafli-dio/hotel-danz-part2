<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Validator;
use App\Models\Kamar;
use App\Models\Reservasi;
use App\Models\Tamu;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ReservasiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $kamar = Kamar::where('status_tersedia', true)->get();
        $tamu = Tamu::all();
        $reservasi = Reservasi::with('kamar','tamu')->get();
        return view('layouts-admin.pages.reservasi.index', compact('kamar','reservasi','tamu'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'tamu_id' => 'required|exists:tamus,id',
            'kamar_id' => 'required|exists:kamars,id',
            'kota' => 'required|in:Jakarta,Surabaya,Solo,Bandung',
            'tanggal_check_in' => 'required|date|before:tanggal_check_out',
            'tanggal_check_out' => 'required|date|after:tanggal_check_in',
            'jumlah_orang' => 'required|in:1,2,4,6',
        ]);
    
        $checkIn = Carbon::parse($request->tanggal_check_in);
        $checkOut = Carbon::parse($request->tanggal_check_out);
        $days = $checkIn->diffInDays($checkOut);
        
        $kamar = Kamar::find($request->kamar_id);
        if (!$kamar || !$kamar->tipeKamar) {
            return redirect()->back()->withErrors(['error' => 'Data kamar atau tipe kamar tidak ditemukan.']);
        }
        $hargaKamar = $kamar->tipeKamar->harga_kamar;
    
        // Kalkulasi total harga
        $totalHarga = $days * $hargaKamar;

        // Simpan ke database
        Reservasi::create([
            'tamu_id' => $request->tamu_id,
            'kamar_id' => $request->kamar_id,
            'kota' => $request->kota,
            'tanggal_check_in' => $request->tanggal_check_in,
            'tanggal_check_out' => $request->tanggal_check_out,
            'jumlah_orang' => $request->jumlah_orang,
            'total_harga' => $totalHarga,
        ]);

        $kamar->update([
            'status_tersedia' => false, 
        ]);
    
        return redirect()->route('get-reservasi');
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
            'tamu_id' => 'required|exists:tamus,id', 
            'kamar_id' => 'required|exists:kamars,id', 
            'kota' => 'required|in:Jakarta,Surabaya,Solo,Bandung', 
            'tanggal_check_in' => 'required|date|after_or_equal:today', 
            'tanggal_check_out' => 'required|date|after:tanggal_check_in',
            'jumlah_orang' => 'required|in:1,2,4,6', 
        ]);
    
        $reservasi = Reservasi::findOrFail($id);
    
        $checkIn = Carbon::parse($request->tanggal_check_in);
        $checkOut = Carbon::parse($request->tanggal_check_out);
        $days = $checkIn->diffInDays($checkOut);
    
        $kamar = Kamar::find($request->kamar_id);
        $hargaKamar = $kamar->tipeKamar->harga_kamar;
    
        $totalHarga = $days * $hargaKamar;
    
        $reservasi->update([
            'tamu_id' => $request->tamu_id,
            'kamar_id' => $request->kamar_id,
            'kota' => $request->kota,
            'tanggal_check_in' => $request->tanggal_check_in,
            'tanggal_check_out' => $request->tanggal_check_out,
            'jumlah_orang' => $request->jumlah_orang,
            'total_harga' => $totalHarga,
        ]);
    
        return redirect()->route('get-reservasi');
    }
    


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $reservasi = Reservasi::findOrFail($id);

        $kamar = $reservasi->kamar;
        if ($kamar) {
            $kamar->update([
                'status_tersedia' => true, 
            ]);
        }

        $reservasi->delete();

        return redirect()->route('get-reservasi');
    }
}
