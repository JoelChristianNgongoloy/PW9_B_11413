<?php

use App\Http\Controllers\BukuController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PinjamBukuController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [LoginController::class, 'login'])->name('login');
Route::post('actionLogin', [LoginController::class, 'actionLogin'])->name('actionLogin');

Route::get('register', [RegisterController::class, 'register'])->name('register');
Route::post('register/action', [RegisterController::class, 'actionRegister'])->name('actionRegister');
Route::get('register/verify/{verify_key}', [RegisterController::class, 'verify'])->name('verify');


Route::get('logout', [LoginController::class, 'actionLogout'])->name('actionLogout')->middleware('auth');

Route::get('home', [HomeController::class, 'index'])->name('home')->middleware('auth');

Route::get('buku', [BukuController::class, 'index'])->name('buku')->middleware('auth');
Route::group(['middleware' => 'auth'], function () {
    Route::get('buku.create', [BukuController::class, 'create'])->name('buku.create');
    Route::post('/buku/store', [BukuController::class, 'store'])->name('buku.store');
    Route::get('edit/{id_buku}', [BukuController::class, 'edit'])->name('buku.edit');
    Route::put('/buku/{id_buku}', [BukuController::class, 'update'])->name('buku.update');
    Route::delete('destroy/{id_buku}', [BukuController::class, 'destroy'])->name('buku.destroy');
    Route::get('/pinjambuku/index', [PinjamBukuController::class, 'index'])->name('pinjambuku.index');
    Route::post('/pinjambuku/{id_buku}', [PinjamBukuController::class, 'bukuPinjam'])->name('pinjambuku.buku');
    Route::get('/pinjambuku/kembalikan', [PinjamBukuController::class, 'idxkembali'])->name('pinjambuku.kembalikan');
    Route::post('/pinjambuku/{id_buku}/returnBuku', [PinjamBukuController::class, 'returnBuku'])->name('pinjambuku.return');
});


