<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LaporBanjir - BPBD Kabupaten Bandung</title>
    <style>
        * { box-sizing: border-box; font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; }
        body { background-color: #f0f4f8; margin: 0; padding: 40px 20px; display: flex; justify-content: center; }
        .card { background: #ffffff; border-radius: 12px; box-shadow: 0 4px 15px rgba(0,0,0,0.1); width: 100%; max-width: 500px; padding: 30px; }
        h2 { color: #1e3a8a; margin-top: 0; text-align: center; }
        p.subtitle { text-align: center; color: #64748b; font-size: 14px; margin-bottom: 25px; }
        .form-group { margin-bottom: 18px; }
        label { display: block; font-weight: 600; margin-bottom: 6px; color: #334155; }
        input { width: 100%; padding: 10px 14px; border: 1px solid #cbd5e1; border-radius: 6px; font-size: 14px; }
        input:focus { outline: none; border-color: #2563eb; box-shadow: 0 0 0 3px rgba(37, 99, 235, 0.2); }
        button { width: 100%; background: #2563eb; color: #ffffff; border: none; padding: 12px; border-radius: 6px; font-size: 16px; font-weight: 600; cursor: pointer; transition: background 0.2s; }
        button:hover { background: #1d4ed8; }
        .error { color: #dc2626; font-size: 12px; margin-top: 4px; }
    </style>
</head>
<body>
    <div class="card">
        <h2>LaporBanjir</h2>
        <p class="subtitle">BPBD Kabupaten Bandung</p>

        <form action="{{ route('banjir.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="nama_pelapor">Nama Pelapor</label>
                <input type="text" id="nama_pelapor" name="nama_pelapor" placeholder="Masukkan nama Anda" value="{{ old('nama_pelapor') }}" required>
                @error('nama_pelapor') <div class="error">{{ $message }}</div> @enderror
            </div>

            <div class="form-group">
                <label for="lokasi">Lokasi Kejadian (Kecamatan/Desa)</label>
                <input type="text" id="lokasi" name="lokasi" placeholder="Contoh: Dayeuhkolot / Desa Citeureup" value="{{ old('lokasi') }}" required>
                @error('lokasi') <div class="error">{{ $message }}</div> @enderror
            </div>

            <div class="form-group">
                <label for="tinggi_genangan">Tinggi Genangan Air (cm)</label>
                <input type="number" id="tinggi_genangan" name="tinggi_genangan" placeholder="Contoh: 50" value="{{ old('tinggi_genangan') }}" required>
                @error('tinggi_genangan') <div class="error">{{ $message }}</div> @enderror
            </div>

            <button type="submit">Kirim Laporan</button>
        </form>
    </div>
</body>
</html>