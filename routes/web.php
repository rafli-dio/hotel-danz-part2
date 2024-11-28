<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\WelcomeController;
use App\Http\Controllers\DashboardAdminController;
use App\Http\Controllers\TamuController;
use App\Http\Controllers\StafController;
use App\Http\Controllers\TipeKamarController;
use App\Http\Controllers\KamarController;
use App\Http\Controllers\ReservasiController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
// auth
Route::get('/login', [LoginController::class, 'index'])->name('get-login');
Route::get('/registrasi', [TamuController::class, 'getRegistrasi'])->name('get-registrasi');
Route::post('save-tamu',[TamuController::class, 'registrasiAkunTamu'])->name('save-tamu');
Route::post('post-login',[LoginController::class, 'postLogin'])->name('post-login');
Route::post('/logout',[LoginController::class,'logout'])->name('get-logout');

Route::get('/', [WelcomeController::class, 'index'])->name('get-admin');
// admin
Route::group(['middleware' => ['auth:user','checkRole:admin']],function() {
    Route::get('/admin', [DashboardAdminController::class, 'index']);
    Route::get('/admin-tamu', [TamuController::class, 'index'])->name('get-tamu');
    Route::get('/admin-staf', [StafController::class, 'index'])->name('get-staf');

    // tipe kamar
    Route::get('/admin-tipe-kamar', [TipeKamarController::class, 'index'])->name('get-tipe-kamar');
    Route::post('save-tipe-kamar',[TipeKamarController::class, 'store'])->name('save-tipe-kamar');
    Route::put('/admin-tipe-kamar/{id}/update', [TipeKamarController::class, 'update'])->name('update-tipe-kamar');
    Route::delete('/admin-tipe-kamar/{id}', [TipeKamarController::class, 'destroy'])->name('delete-tipe-kamar');
    // kamar
    Route::get('/admin-kamar', [KamarController::class, 'index'])->name('get-kamar');
    Route::post('save-kamar',[KamarController::class, 'store'])->name('save-kamar');
    Route::put('/admin-kamar/{id}/update', [KamarController::class, 'update'])->name('update-kamar');
    Route::delete('/admin-kamar/{id}', [KamarController::class, 'destroy'])->name('delete-kamar');

    // reservasi
    Route::get('/admin-reservasi', [ReservasiController::class, 'index'])->name('get-reservasi');
    Route::post('save-reservasi',[ReservasiController::class, 'store'])->name('save-reservasi');
    Route::delete('/admin-reservasi/{id}', [ReservasiController::class, 'destroy'])->name('delete-reservasi');
    Route::put('/admin-reservasi/{id}/update', [ReservasiController::class, 'update'])->name('update-reservasi');

    // tamu-admin
    Route::delete('/admin-tamu/{id}', [TamuController::class, 'destroy'])->name('delete-tamu');
    Route::put('/admin-tamu/{id}/update', [TamuController::class, 'update'])->name('update-tamu');
});  
    
// tamu
Route::group(['middleware' => ['auth:tamu','checkRole:tamu']],function() {
    Route::get('/home-tamu',[TamuController::class, 'getHomeTamu'])->name('get-home-tamu');
});