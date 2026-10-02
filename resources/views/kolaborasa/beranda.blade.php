<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Kolaborasa - Platform Kolaborasi Proyek</title>
</head>
<body style="font-family: sans-serif; padding: 20px;">
    <h1>Selamat Datang di Kolaborasa</h1>
    <nav>
        <a href="{{ route('kolaborasa.beranda') }}">Beranda</a> |
        <a href="{{ route('kolaborasa.proyek') }}">Eksplorasi Proyek</a> |
        <a href="{{ route('kolaborasa.buat_proyek') }}">Buat Proyek Baru</a> |
        <a href="{{ route('kolaborasa.matchmaking') }}">Matchmaking Tim</a> |
        <a href="{{ route('kolaborasa.profil') }}">Profil Saya</a>
    </nav>
    <hr>
    <p>Wadah kolaborasi pembuatan proyek dan pencarian anggota tim berbasis keahlian.</p>
</body>
</html>