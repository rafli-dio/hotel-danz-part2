<?php

namespace App\Http\Controllers;
use App\Models\TipeKamar;
use Illuminate\Http\Request;

class WelcomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tipekamar = TipeKamar::all();
        return view('layouts-user.index',compact('tipekamar'));
    }


}
