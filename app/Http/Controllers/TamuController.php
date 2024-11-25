<?php

namespace App\Http\Controllers;
use App\Models\Tamu;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
class TamuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tamu = Tamu::all();
        return view('layouts-admin.pages.tamu.index', compact('tamu'));
    }

    public function getRegistrasi()
    {
        return view('auth.registrasi');
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
    public function registrasiAkunTamu(Request $request)
    {
        $request->validate([
            'nama_panjang' => 'required|string|max:255',
            'email' => 'required|email|unique:tamus,email',
            'alamat' => 'required|string|max:255',
            'nomor_telepon' => 'required|string|max:15',
            'password' => [
                'required',
                'confirmed',
                'min:8',
                'regex:/[a-z]/',
                'regex:/[A-Z]/',
                'regex:/[0-9]/',
            ],
        ], [
            'password.required' => 'Password wajib diisi.',
            'password.confirmed' => 'Konfirmasi password tidak sesuai.',
            'password.min' => 'Password harus minimal 8 karakter.',
            'password.regex' => 'Password harus mengandung setidaknya satu huruf besar, huruf kecil, dan angka.',
        ]);
        
        Tamu::create([
            'nama_panjang' => $request->nama_panjang,
            'email' => $request->email,
            'alamat' => $request->alamat,
            'nomor_telepon' => $request->nomor_telepon,
            'password' => Hash::make($request->password),
        ]);
        
        
        return redirect()->route('get-login');
        
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
            'nama_panjang' => 'required|string|max:255',
            'email' => [
                'required',
                'email',
                Rule::unique('tamus', 'email')->ignore($id),
            ],
            'alamat' => 'required|string|max:255',
            'nomor_telepon' => 'required|string|max:15',
            'password' => [
                'nullable', 
                'confirmed', 
                'min:8',
                'regex:/[a-z]/', 
                'regex:/[A-Z]/',
                'regex:/[0-9]/', 
            ],
        ]);
        
        $tamu = Tamu::findOrFail($id);

        if ($request->filled('password')) {
            if (!$request->filled('old_password')) {
                return back()->withErrors(['old_password' => 'Password lama harus diisi jika ingin mengganti password']);
            }

            if (!Hash::check($request->old_password, $tamu->password)) {
                return back()->withErrors(['old_password' => 'Password lama tidak sesuai']);
            }

            $tamu->password = Hash::make($request->password);
        }

        $tamu->nama_panjang = $request->nama_panjang;
        $tamu->email = $request->email;
        $tamu->alamat = $request->alamat;

        $tamu->save();

        return redirect()->route('get-tamu');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $tamu = Tamu::findOrFail($id);
        $tamu->delete();
        return redirect()->route('get-tamu');
    }
}
