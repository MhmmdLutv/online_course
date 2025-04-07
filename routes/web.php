<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\dashboardController;
use App\Http\Controllers\kursusController;
use App\Http\Controllers\materiController;
use App\Http\Controllers\pembayaranController;
use App\Http\Controllers\kursusPenggunaController;
use App\Http\Controllers\materiPenggunaController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Auth\LoginController;
use Illuminate\Support\Facades\Auth;




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


Route::get('/', function () {
    return view('auth.login');
});

Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login']);
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');
Auth::routes();

// ✅ BISA DIAKSES OLEH ADMIN DAN USER
Route::middleware(['auth'])->group(function () {
    Route::get('/home', [HomeController::class, 'index'])->name('home');

    Route::get('/dashboard', [dashboardController::class, 'index'])->name('dashboard');

});

// ✅ KHUSUS ADMIN
Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::get('/kursus', [kursusController::class, 'index'])->name('kursus.index');
    Route::get('/kursus/create', [kursusController::class, 'create'])->name('kursus.create');
    Route::post('/kursus', [kursusController::class, 'store'])->name('kursus.store');
    Route::get('/kursus/{kursus}/edit', [kursusController::class, 'edit'])->name('kursus.edit');
    Route::put('/kursus/{kursus}', [kursusController::class, 'update'])->name('kursus.update');
    Route::delete('/kursus/{kursus}', [kursusController::class, 'destroy'])->name('kursus.destroy');
    Route::get('/kursus/{kursus}', [kursusController::class, 'show'])->name('kursus.show');

    Route::get('/materi', [materiController::class, 'index'])->name('materi.index');
    Route::get('/materi/create', [materiController::class, 'create'])->name('materi.create');
    Route::post('/materi', [materiController::class, 'store'])->name('materi.store');
    Route::get('/materi/{materi}/edit', [materiController::class, 'edit'])->name('materi.edit');
    Route::put('/materi/{materi}', [materiController::class, 'update'])->name('materi.update');
    Route::delete('/materi/{materi}', [materiController::class, 'destroy'])->name('materi.destroy');
    Route::get('/materi/{materi}', [materiController::class, 'show'])->name('materi.show');

    Route::get('/pembayaran', [pembayaranController::class, 'index'])->name('pembayaran.index');
    Route::get('/pembayaran/create', [pembayaranController::class, 'create'])->name('pembayaran.create');
    Route::post('/pembayaran', [pembayaranController::class, 'store'])->name('pembayaran.store');
    Route::get('/pembayaran/{pembayaran}/edit', [pembayaranController::class, 'edit'])->name('pembayaran.edit');
    Route::put('/pembayaran/{pembayaran}', [pembayaranController::class, 'update'])->name('pembayaran.update');
    Route::delete('/pembayaran/{pembayaran}', [pembayaranController::class, 'destroy'])->name('pembayaran.destroy');
    Route::get('/pembayaran/{pembayaran}', [pembayaranController::class, 'show'])->name('pembayaran.show');
});

// ✅ KHUSUS USER
Route::middleware(['auth', 'role:user'])->group(function () {
    Route::get('/kursusPengguna', [kursusPenggunaController::class, 'index'])->name('kursusPengguna.index');
    Route::get('/materiPengguna', [materiPenggunaController::class, 'index'])->name('materiPengguna.index');
    Route::post('/keranjang/tambah/{id}', [App\Http\Controllers\dashboardController::class, 'tambah'])->name('keranjang.tambah');

});
