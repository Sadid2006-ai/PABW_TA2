<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LaporBanjirController extends Controller
{
    // Menampilkan halaman form pelaporan
    public function index()
    {
        return view('lapor_banjir.index');
    }

    // Memproses data inputan temporary & menampilkan halaman konfirmasi
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nama_pelapor'   => 'required|string|max:100',
            'lokasi'         => 'required|string|max:150',
            'tinggi_genangan'=> 'required|numeric|min:1',
        ]);

        return view('lapor_banjir.konfirmasi', [
            'data' => $validatedData
        ]);
    }
}