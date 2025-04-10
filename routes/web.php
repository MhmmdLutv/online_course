<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\dashboardController;
use App\Http\Controllers\kursusController;
use App\Http\Controllers\materiController;
use App\Http\Controllers\pembayaranController;
use App\Http\Controllers\kursusPenggunaController;
use App\Http\Controllers\materiPenggunaController;
use App\Http\Controllers\userController;
// use App\Http\Controllers\HomeController;
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
    Route::get('/dashboard', function () {
        $user = Auth::user();
        if ($user->role === 'admin') {
            return redirect()->route('dashboard.admin');
        } else {
            return redirect()->route('dashboard.user');
        }
    });

    Route::get('/dashboard/admin', [dashboardController::class, 'index'])->name('dashboard.admin');
    Route::get('/dashboard/user', [dashboardController::class, 'index'])->name('dashboard.user');

    Route::get('/pembayaran/berhasil', [pembayaranController::class, 'berhasil'])->name('pembayaran.berhasil');

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

    Route::get('/users', [userController::class, 'index'])->name('users.index');
    Route::get('/users/create', [userController::class, 'create'])->name('users.create');
    Route::post('/users', [userController::class, 'store'])->name('users.store');
    Route::get('/users/{users}/edit', [userController::class, 'edit'])->name('users.edit');
    Route::put('/users/{users}', [userController::class, 'update'])->name('users.update');
    Route::delete('/users/{users}', [userController::class, 'destroy'])->name('users.destroy');
    Route::get('/users/{users}', [userController::class, 'show'])->name('users.show');
});

// ✅ KHUSUS USER
Route::middleware(['auth', 'role:user'])->group(function () {
    Route::get('/kursusPengguna', [kursusPenggunaController::class, 'index'])->name('kursusPengguna.index');
    Route::get('/materiPengguna', [materiPenggunaController::class, 'index'])->name('materiPengguna.index');

    Route::get('/pembayaran/create', [pembayaranController::class, 'create'])->name('pembayaran.create');
    Route::post('/pembayaran', [pembayaranController::class, 'store'])->name('pembayaran.store');
    
});

