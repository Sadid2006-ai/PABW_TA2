<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MatchmakingController extends Controller
{
    public function index()
    {
        return view('kolaborasa.kalkulator_match', ['hasil' => null]);
    }

    public function proses(Request $request)
    {
        $request->validate([
            'nama_kandidat'   => 'required|string',
            'role_tujuan'     => 'required|string',
            'skor_skill'      => 'required|numeric|min:10|max:100',
            'jam_komitmen'    => 'required|numeric|min:1|max:40',
            'skor_komunikasi' => 'required|numeric|min:10|max:100',
        ]);

        $skill = $request->skor_skill;
        $jam = $request->jam_komitmen;
        $komunikasi = $request->skor_komunikasi;

        // Formula Pengolahan Data Engine Kolaborasa:
        // Bobot: Skill (50%), Komitmen Jam (30%), Komunikasi (20%)
        $skorJam = min(($jam / 20) * 100, 100); // Target ideal 20 jam/minggu
        $totalSkor = round(($skill * 0.5) + ($skorJam * 0.3) + ($komunikasi * 0.2), 1);

        if ($totalSkor >= 80) {
            $status = 'Sangat Direkomendasikan';
            $warna = '#10b981'; // Hijau
            $catatan = 'Kandidat memiliki keselarasan tinggi untuk langsung bergabung dalam proyek.';
        } elseif ($totalSkor >= 60) {
            $status = 'Cukup Potensial';
            $warna = '#f59e0b'; // Oranye
            $catatan = 'Memerlukan sedikit penyesuaian pembagian beban kerja atau pelatihan tambahan.';
        } else {
            $status = 'Kurang Cocok';
            $warna = '#ef4444'; // Merah
            $catatan = 'Kapasitas waktu atau skill kandidat belum memenuhi ambang batas kriteria proyek.';
        }

        $hasil = [
            'nama'        => $request->nama_kandidat,
            'role'        => $request->role_tujuan,
            'skor'        => $totalSkor,
            'status'      => $status,
            'warna'       => $warna,
            'catatan'     => $catatan
        ];

        return view('kolaborasa.kalkulator_match', ['hasil' => $hasil]);
    }
}