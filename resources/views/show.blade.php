<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Properti</title>
</head>
<body>
    <div class="property-detail">
        <h1>{{ $property->name }}</h1>
        <img src="{{ $property->photo }}" alt="{{ $property->name }}" width="600">
        <p><strong>Alamat:</strong> {{ $property->alamat }}</p>
        <p><strong>Deskripsi:</strong> {{ $property->deskripsi }}</p>
        <p><strong>Harga:</strong> Rp {{ number_format($property->harga, 2) }}</p>
        <p><strong>Kamar Tidur:</strong> {{ $property->jumlah_kamar_tidur }}</p>
        <p><strong>Kamar Mandi:</strong> {{ $property->jumlah_kamar_mandi }}</p>
        <p><strong>Luas:</strong> {{ $property->luas }} m²</p>
        <p><strong>Kategori:</strong> {{ ucfirst($property->category) }}</p>
        <p><strong>Ketersediaan:</strong> {{ ucfirst($property->ketersediaan) }}</p>
        <a href="{{ route('properties.index') }}">Kembali ke Daftar Properti</a>
    </div>
</body>
</html>
