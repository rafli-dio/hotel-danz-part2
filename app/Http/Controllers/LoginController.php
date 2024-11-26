<?php

namespace App\Http\Controllers;
use Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class LoginController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view("auth.login");
    }


    public function postLogin(Request $request)
    {
        if(Auth::guard('tamu')->attempt(['email' => $request->email, 'password' => $request->password])){
            return redirect('/home-tamu');
        }
        elseif((Auth::guard('user')->attempt(['email' => $request->email, 'password' => $request->password]))){
            return redirect ('/admin');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function logout()
    {
        if (Auth::guard('tamu')->check()) {
            Auth::guard('tamu')->logout();
        } elseif (Auth::guard('user')->check()) {
            Auth::guard('user')->logout();
        }
    
        request()->session()->invalidate();
        request()->session()->regenerateToken();
    
        return redirect('/')->with('success', 'Logout berhasil.');
    }
}

