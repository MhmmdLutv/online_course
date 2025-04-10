<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\pembayaran;
use App\kursus;

class pembayaranController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pembayaran = pembayaran::orderBy('created_at', 'DESC')->get();
        return view('pembayaran.index', compact('pembayaran'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $kursus = Kursus::all(); // Pastikan kursus diambil dari database
        return view('pembayaran.create', compact('kursus'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'kursusid' => 'required|exists:kursus,kursusid',
            'tujuan_tf' => 'required|string',
            'tanggal_tf' => 'required|date', // Pastikan ini ada
            'jumlah_pembayaran' => 'required|numeric|min:0'
        ]);

        pembayaran::create($request->all());

        return redirect()->route('pembayaran.berhasil')->with('success', 'Pembayaran berhasil!');
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
        $pembayaran = pembayaran::findOrFail($id);
        $kursus = kursus::all();
        return view('pembayaran.edit', compact('pembayaran', 'kursus'));
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
        $pembayaran = pembayaran::findOrFail($id);

        $request->validate([
            'kursusid' => 'required|exists:kursus,kursusid',
            'tujuan_tf' => 'required|string',
            'tanggal_tf' => 'required|date',
            'jumlah_pembayaran' => 'required|numeric|min:0'
        ]);

        $pembayaran->update($request->all());

        return redirect()->route('pembayaran.index')->with('success', 'Pembayaran berhasil diperbarui!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $pembayaran = pembayaran::findOrFail($id);
        $pembayaran->delete();

        return redirect()->route('pembayaran.index')->with('success', 'Pembayaran berhasil dihapus!');
    }

    public function berhasil()
    {
        $telegramLink = "https://t.me/+9pzfoeGXsYc2ZWE1"; 
        return view('pembayaran.berhasil', compact('telegramLink'));
    }
}
