<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Validator;
use App\Models\Kamar;
use App\Models\Reservasi;
use App\Models\Tamu;
use App\Models\TipeKamar;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Auth;
use Picqer\Barcode\BarcodeGeneratorHTML;

class ReservasiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $reservasi = Reservasi::all();
        $kamar = Kamar::where('status_tersedia', true)
                     ->orWhereIn('id', Reservasi::pluck('kamar_id'))
                     ->get();
        $tamu = Tamu::all();
        return view('layouts-admin.pages.reservasi.index', compact('kamar', 'reservasi', 'tamu'));
    }
    

    public function formBooking($tipe_kamar)
    {
        $tipe = TipeKamar::findOrFail($tipe_kamar);
        $kamar = Kamar::where('tipe_kamar_id', $tipe_kamar)->where('status_tersedia', true)->get();
        $tamu = auth('tamu')->user();

        return view('layouts-user.pages.rooms.reservasi', compact('tipe', 'kamar', 'tamu'));
    }

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
    
        $totalHarga = $days * $hargaKamar;

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
    
        $kamar->update([
            'status_tersedia' => false, 
        ]);
    
        return redirect()->route('get-reservasi');
    }

    public function showInvoice($id)
    {
        $reservasi = Reservasi::with(['tamu', 'kamar.tipeKamar'])->findOrFail($id);

        $generator = new BarcodeGeneratorHTML();
        $barcode = $generator->getBarcode($reservasi->id, $generator::TYPE_CODE_128);
    
        return view('layouts-user.pages.rooms.invoice', compact('reservasi', 'barcode'));
    }

    public function storeBokingTamu(Request $request)
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
    
        $totalHarga = $days * $hargaKamar;

        $reservasi = Reservasi::create([
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
    
        $kamar->update([
            'status_tersedia' => false, 
        ]);
    
        return redirect()->route('show-invoice', ['id' => $reservasi->id]);
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
        $kamarLama = $reservasi->kamar_id;
    
        $checkIn = Carbon::parse($request->tanggal_check_in);
        $checkOut = Carbon::parse($request->tanggal_check_out);
        $days = $checkIn->diffInDays($checkOut);
    
        $kamar = Kamar::find($request->kamar_id);
        $hargaKamar = $kamar->tipeKamar->harga_kamar;
    
        $totalHarga = $days * $hargaKamar;
    
        if ($kamarLama != $request->kamar_id) {
            Kamar::where('id', $kamarLama)->update(['status_tersedia' => true]);
        }
    
        Kamar::where('id', $request->kamar_id)->update(['status_tersedia' => false]);
    
        $reservasi->update([
            'tamu_id' => $request->tamu_id,
            'kamar_id' => $request->kamar_id,
            'kota' => $request->kota,
            'tanggal_check_in' => $request->tanggal_check_in,
            'tanggal_check_out' => $request->tanggal_check_out,
            'jumlah_orang' => $request->jumlah_orang,
            'total_harga' => $totalHarga,
        ]);
    
        return redirect()->route('get-reservasi')->with('success', 'Reservasi berhasil diperbarui');
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
