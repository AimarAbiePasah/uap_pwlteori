<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Properti</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f9f9f9;
        }
        .header {
            background-color: #007bff;
            color: #fff;
            padding: 10px 20px;
            display: flex;
            align-items: center;
            justify-content: space-between;
        }
        .header h1 {
            margin: 0;
            font-size: 24px;
        }
        .navbar {
            display: flex;
            gap: 15px;
        }
        .navbar a, .navbar button {
            color: #fff;
            text-decoration: none;
            padding: 8px 15px;
            border-radius: 4px;
            transition: background-color 0.3s;
        }
        .navbar a:hover {
            background-color: #2c3e97;
        }
        .navbar button {
            background-color: #e74c3c;
            border: none;
            cursor: pointer;
        }
        .navbar button:hover {
            background-color: #c0392b;
        }
        .container {
            width: 90%;
            max-width: 1000px;
            margin: 20px auto;
        }
        .property-detail {
            display: flex;
            gap: 20px;
            align-items: flex-start;
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }
        .property-image img {
            width: 600px;
            height: auto;
            border-radius: 8px;
        }
        .property-info {
            max-width: 60%;
        }
        .property-info h1 {
            font-size: 28px;
            color: #333;
            margin-top: 0;
        }
        .property-info p {
            margin: 10px 0;
            font-size: 16px;
            color: #555;
        }
        .property-info .price {
            color: #3f51b5;
            font-weight: bold;
            font-size: 20px;
        }
        .actions {
            margin-top: 20px;
        }
        .actions a {
            display: inline-block;
            color: #fff;
            padding: 10px 20px;
            border-radius: 4px;
            text-decoration: none;
            margin-right: 10px;
        }
        .actions .btn-buy {
            background-color: #28a745;
        }
        .actions .btn-edit {
            background-color: #ffc107;
        }
        .actions .btn-delete {
            background-color: #dc3545;
        }
        footer {
            background-color: #007bff;
            color: #fff;
            text-align: center;
            padding: 10px;
            position: fixed;
            bottom: 0;
            width: 100%;
        }
        .footer-text {
            font-size: 12px;
        }
    </style>
</head>
<body>

    <!-- Navbar -->
    <div class="header">
        <h1>RealEstate</h1>
        <div class="navbar">
            <a href="/">Home</a>
            <a href="#">About</a>
            <a href="{{ route('properties.index') }}">Properties</a>
            <a href="#">Profile</a>
            <form action="{{ route('logout') }}" method="POST" style="display: inline;">
                @csrf
                <button type="submit">Logout</button>
            </form>
        </div>
    </div>

    <div class="container">
        <div class="property-detail">
            <div class="property-image">
                <img src="{{ asset('storage/' . $property->photo) }}" alt="{{ $property->name }}">
            </div>
            <div class="property-info">
                <h1>{{ $property->name }}</h1>
                <p><strong>Alamat:</strong> {{ $property->alamat }}</p>
                <p><strong>Deskripsi:</strong> {{ $property->deskripsi }}</p>
                <p class="price">Rp {{ number_format($property->harga, 2) }}</p>
                <p><strong>Kamar Tidur:</strong> {{ $property->jumlah_kamar_tidur }}</p>
                <p><strong>Kamar Mandi:</strong> {{ $property->jumlah_kamar_mandi }}</p>
                <p><strong>Luas:</strong> {{ $property->luas }} m²</p>
                <p><strong>Kategori:</strong> {{ ucfirst($property->category) }}</p>
                <p><strong>Ketersediaan:</strong> {{ ucfirst($property->ketersediaan) }}</p>
            </div>
        </div>
    </div>
    <div class="actions">
   
    <a href="#" class="btn-buy">Buy</a>
</div>

    <footer>
        <div class="footer-text">Design by kelompok & web lanjut</div>
    </footer>
</body>
</html>
