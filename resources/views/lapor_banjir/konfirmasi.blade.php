<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Konfirmasi Laporan - LaporBanjir</title>
    <style>
        * { box-sizing: border-box; font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; }
        body { background-color: #f0f4f8; margin: 0; padding: 40px 20px; display: flex; justify-content: center; }
        .card { background: #ffffff; border-radius: 12px; box-shadow: 0 4px 15px rgba(0,0,0,0.1); width: 100%; max-width: 500px; padding: 30px; }
        .badge-success { background-color: #dcfce7; color: #166534; padding: 8px 16px; border-radius: 20px; font-weight: 600; display: inline-block; font-size: 14px; margin-bottom: 20px; }
        h2 { color: #1e3a8a; margin-top: 0; }
        .detail-group { border-bottom: 1px solid #f1f5f9; padding: 12px 0; }
        .detail-group:last-child { border-bottom: none; }
        .label { font-size: 12px; color: #64748b; text-transform: uppercase; letter-spacing: 0.5px; }
        .value { font-size: 16px; color: #1e293b; font-weight: 600; margin-top: 4px; }
        .btn-back { display: block; text-align: center; background: #64748b; color: #ffffff; text-decoration: none; padding: 10px; border-radius: 6px; margin-top: 25px; font-weight: 600; }
        .btn-back:hover { background: #475569; }
    </style>
</head>
<body>
    <div class="card">
        <div class="badge-success">✓ Laporan Diterima (Temporary)</div>
        <h2>Bukti Pelaporan</h2>

        <div class="detail-group">
            <div class="label">Nama Pelapor</div>
            <div class="value">{{ $data['nama_pelapor'] }}</div>
        </div>

        <div class="detail-group">
            <div class="label">Lokasi Kejadian</div>
            <div class="value">{{ $data['lokasi'] }}</div>
        </div>

        <div class="detail-group">
            <div class="label">Tinggi Genangan Air</div>
            <div class="value">{{ $data['tinggi_genangan'] }} cm</div>
        </div>

        <a href="{{ route('banjir.index') }}" class="btn-back">Kirim Laporan Lain</a>
    </div>
</body>
</html>