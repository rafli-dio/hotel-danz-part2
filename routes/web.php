<?php

use Illuminate\Support\Facades\Route;
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

// Route::get('/', function () {
//     return view('welcome.welcome');
// });
Route::get('/', [WelcomeController::class, 'index']);
Route::get('/admin', [DashboardAdminController::class, 'index']);
Route::get('/admin-tamu', [TamuController::class, 'index'])->name('get-tamu');
Route::get('/admin-staf', [StafController::class, 'index'])->name('get-staf');
Route::get('/admin-tipe-kamar', [TipeKamarController::class, 'index'])->name('get-tipe-kamar');
Route::get('/admin-kamar', [KamarController::class, 'index'])->name('get-kamar');
Route::get('/admin-reservasi', [ReservasiController::class, 'index'])->name('get-reservasi');