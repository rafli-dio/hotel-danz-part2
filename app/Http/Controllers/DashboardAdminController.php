<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tamu;
use App\Models\Reservasi;
use App\Models\Kamar;
use App\Models\User;

class DashboardAdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $totalTamu = Tamu::count();
        $totalReservasi = Reservasi::count();
        $totalKamar = Kamar::count();
        $totalStaf = User::where('role', 'staf')->count();
        return view('layouts-admin.index', compact('totalTamu','totalReservasi','totalKamar','totalStaf'));
    }

}
