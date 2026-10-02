<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kolaborasa - Matchmaking Engine</title>
    <style>
        * { box-sizing: border-box; font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; }
        body { background: #0f172a; color: #f8fafc; margin: 0; padding: 40px 20px; }
        .container { max-width: 900px; margin: 0 auto; display: grid; grid-template-columns: 1fr 1fr; gap: 30px; }
        @media (max-width: 768px) { .container { grid-template-columns: 1fr; } }
        .card { background: #1e293b; padding: 25px; border-radius: 12px; border: 1px solid #334155; }
        h2 { color: #38bdf8; margin-top: 0; font-size: 18px; }
        .form-group { margin-bottom: 15px; }
        label { display: block; font-size: 13px; color: #94a3b8; margin-bottom: 5px; }
        input, select { width: 100%; padding: 10px; background: #0f172a; border: 1px solid #334155; border-radius: 6px; color: #fff; }
        button { width: 100%; background: #2563eb; color: white; border: none; padding: 12px; border-radius: 6px; font-weight: bold; cursor: pointer; margin-top: 10px; transition: 0.2s; }
        button:hover { background: #1d4ed8; }
        .result-box { text-align: center; padding: 20px; border-radius: 8px; margin-top: 15px; background: #0f172a; }
        .score { font-size: 48px; font-weight: 800; margin: 10px 0; }
        .badge { padding: 6px 14px; border-radius: 20px; font-weight: bold; display: inline-block; font-size: 14px; }
    </style>
</head>
<body>

<div style="text-align: center; margin-bottom: 30px;">
    <h1 style="color: #38bdf8; margin-bottom: 5px;">Kolaborasa</h1>
    <p style="color: #94a3b8; margin-top: 0;">Simulasi Engine Pengolahan Matchmaking & Kesesuaian Tim Proyek</p>
</div>

<div class="container">
    <!-- INPUT DATA -->
    <div class="card">
        <h2>1. Input Profil & Parameter Kolaborator</h2>
        <form action="{{ route('matchmaking.proses') }}" method="POST">
            @csrf
            <div class="form-group">
                <label>Nama Anggota / Pelamar</label>
                <input type="text" name="nama_kandidat" placeholder="Contoh: Sadid Nur Samdya" required value="{{ old('nama_kandidat', $hasil['nama'] ?? '') }}">
            </div>

            <div class="form-group">
                <label>Target Role Dalam Proyek</label>
                <select name="role_tujuan">
                    <option value="Backend Developer">Backend Developer</option>
                    <option value="Frontend Developer">Frontend Developer</option>
                    <option value="UI/UX Designer">UI/UX Designer</option>
                    <option value="System Analyst">System Analyst</option>
                </select>
            </div>

            <div class="form-group">
                <label>Tingkat Penguasaan Skill (10 - 100)</label>
                <input type="number" min="10" max="100" name="skor_skill" placeholder="Contoh: 85" required value="85">
            </div>

            <div class="form-group">
                <label>Komitmen Waktu (Jam / Minggu)</label>
                <input type="number" min="1" max="40" name="jam_komitmen" placeholder="Contoh: 15" required value="15">
            </div>

            <div class="form-group">
                <label>Skor Kemampuan Komunikasi (10 - 100)</label>
                <input type="number" min="10" max="100" name="skor_komunikasi" placeholder="Contoh: 80" required value="80">
            </div>

            <button type="submit" id="btnSubmit">Analisis Kesesuaian</button>
        </form>
    </div>

    <!-- HASIL PROSES -->
    <div class="card">
        <h2>2. Indeks Kompatibilitas Kolaborasi</h2>
        @if($hasil)
            <div class="result-box" style="border: 2px solid {{ $hasil['warna'] }};">
                <span style="color: #94a3b8; font-size: 12px; letter-spacing: 1px;">HASIL ANALISIS: {{ strtoupper($hasil['nama']) }}</span>
                <div style="font-size: 14px; color: #cbd5e1; margin-top: 5px;">Role Target: {{ $hasil['role'] }}</div>
                
                <div class="score" style="color: {{ $hasil['warna'] }};">{{ $hasil['skor'] }}%</div>
                
                <div class="badge" style="background: {{ $hasil['warna'] }}; color: white;">
                    {{ $hasil['status'] }}
                </div>
                
                <p style="text-align: left; margin-top: 20px; font-size: 13px; color: #cbd5e1; line-height: 1.5; background: #1e293b; padding: 12px; border-radius: 6px;">
                    <strong>Rekomendasi Sistem:</strong><br>
                    {{ $hasil['catatan'] }}
                </p>
            </div>
        @else
            <div style="text-align: center; color: #64748b; padding-top: 60px;">
                <p>Isi form kriteria kandidat di sebelah kiri lalu klik <strong>Analisis Kesesuaian</strong> untuk mensimulasikan kalkulasi ketersediaan tim.</p>
            </div>
        @endif
    </div>
</div>

<script>
    document.querySelector('form').addEventListener('submit', function() {
        const btn = document.getElementById('btnSubmit');
        btn.innerText = 'Menghitung Skor Kompatibilitas...';
        btn.style.opacity = '0.7';
    });
</script>

</body>
</html>