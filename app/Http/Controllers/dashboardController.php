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
            $totalKursus = kursus::count();
            $totalMateri = materi::count();
            $totalPembayaran = pembayaran::count();

            return view('dashboard.home', compact('totalKursus', 'totalMateri', 'totalPembayaran'));
        } elseif ($user->role === 'user') {
            // Data kursus untuk user
            $kursusList = [
                [
                    'image' => asset('/assets/images/slider/img-slide-1.jpg'),
                    'judul' => 'Dasar-Dasar Pengembangan Website: HTML, CSS dan...',
                    'pengajar' => 'Remote Worker Indonesia',
                    'rating' => 4.6,
                    'ulasan' => 56,
                    'harga_asli' => 309000,
                    'harga_diskon' => 99000,
                    'status' => ''
                ],
                [
                    'image' => asset('/assets/images/slider/img-slide-2.jpg'),
                    'judul' => 'Belajar Web Development Menggunakan Bahasa...',
                    'pengajar' => 'CodePolitan Online',
                    'rating' => 4.6,
                    'ulasan' => 393,
                    'harga_asli' => 529000,
                    'harga_diskon' => 99000,
                    'status' => ''
                ],
                [
                    'image' => asset('/assets/images/slider/img-slide-4.jpg'),
                    'judul' => 'Web Programming Dasar Sampai Mahir',
                    'pengajar' => 'Dr. Junaidi S.Kom',
                    'rating' => 4.8,
                    'ulasan' => 33,
                    'harga_asli' => 289000,
                    'harga_diskon' => 99000,
                    'status' => ''
                ],
                [
                    'image' => asset('/assets/images/slider/img-slide-6.jpg'),
                    'judul' => 'The Complete Full-Stack Web Development Bootcamp',
                    'pengajar' => 'Dr. Angela Yu',
                    'rating' => 4.7,
                    'ulasan' => 432128,
                    'harga_asli' => 639000,
                    'harga_diskon' => 99000,
                    'status' => 'Terlaris'
                ]
            ];

            

            return view('dashboard.user', compact('kursusList'));
        } else {
            return redirect('/login')->with('error', 'Akses tidak diizinkan.');
        }
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function admin()
    {
        return view('dashboard.home'); // view untuk admin
    }

    public function user()
    {
        return view('dashboard.user'); // view untuk user
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
