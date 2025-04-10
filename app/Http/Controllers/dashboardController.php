<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\kursus;
use App\materi;
use App\pembayaran;
use Illuminate\Support\Facades\Auth;
class dashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (!Auth::check()) {
            return redirect('/login')->with('error', 'Silakan login terlebih dahulu.');
        }
        
        $user = Auth::user();
        
        if ($user->role === 'admin') {
            $totalPengguna = User::where('role', 'users')->count();
            $totalKursus = kursus::count();
            $totalMateri = materi::count();
            $totalPembayaran = pembayaran::count();
        
            return view('dashboard.home', compact('totalPengguna', 'totalKursus', 'totalMateri', 'totalPembayaran'));
        } elseif ($user->role === 'user') {
            $totalKursus = kursus::count();
            $totalMateri = materi::count();
        
            return view('dashboard.user', compact('totalKursus', 'totalMateri'));
        } else {
            return redirect('/login')->with('error', 'Role tidak dikenali.');
        }
        
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function admin()
{
    if (!Auth::check()) {
        return redirect('/login')->with('error', 'Silakan login terlebih dahulu.');
    }
    
    $user = Auth::user();
    
    if ($user->role === 'admin') {
        $totalPengguna = User::where('role', 'users')->count();
        $totalKursus = kursus::count();
        $totalMateri = materi::count();
        $totalPembayaran = pembayaran::count();
    
        return view('dashboard.home', compact('totalPengguna', 'totalKursus', 'totalMateri', 'totalPembayaran'));
    } elseif ($user->role === 'user') {
        $totalKursus = kursus::count();
        $totalMateri = materi::count();
    
        return view('dashboard.user', compact('totalKursus', 'totalMateri'));
    } else {
        return redirect('/login')->with('error', 'Role tidak dikenali.');
    }
}


    public function user()
    {
        if (!Auth::check()) {
            return redirect('/login')->with('error', 'Silakan login terlebih dahulu.');
        }
        
        $user = Auth::user();
        
        if ($user->role === 'admin') {
            $totalPengguna = User::where('role', 'users')->count();
            $totalKursus = kursus::count();
            $totalMateri = materi::count();
            $totalPembayaran = pembayaran::count();
        
            return view('dashboard.home', compact('totalPengguna', 'totalKursus', 'totalMateri', 'totalPembayaran'));
        } elseif ($user->role === 'user') {
            $totalKursus = kursus::count();
            $totalMateri = materi::count();
        
            return view('dashboard.user', compact('totalKursus', 'totalMateri'));
        } else {
            return redirect('/login')->with('error', 'Role tidak dikenali.');
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
