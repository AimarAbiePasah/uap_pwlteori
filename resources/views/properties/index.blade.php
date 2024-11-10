<!-- resources/views/properties/index.blade.php -->
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Our Properties</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f9f9f9;
        }
        /* Navbar Styling */
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
        .navbar a {
            color: #fff;
            text-decoration: none;
            padding: 8px 15px;
            border-radius: 4px;
            transition: background-color 0.3s;
        }
        .navbar a:hover {
            background-color: #2c3e97;
        }
        .navbar form {
            display: inline;
        }
        .navbar button {
            background-color: #e74c3c;
            border: none;
            color: #fff;
            padding: 8px 15px;
            border-radius: 4px;
            cursor: pointer;
            transition: background-color 0.3s;
        }
        .navbar button:hover {
            background-color: #c0392b;
        }
        .container {
            width: 90%;
            max-width: 1200px;
            margin: 20px auto;
        }
        .properties-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(250px, 1fr));
            gap: 20px;
        }
        .property-card {
            background-color: #fff;
            border: 1px solid #ddd;
            border-radius: 8px;
            overflow: hidden;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s;
            text-align: center;
        }
        .property-card:hover {
            transform: scale(1.05);
        }
        .property-image img {
            width: 100%;
            height: 200px;
            object-fit: cover;
        }
        .property-info {
            padding: 15px;
        }
        .property-info h3 {
            font-size: 18px;
            color: #333;
            margin: 10px 0;
        }
        .property-info p {
            font-size: 14px;
            color: #777;
            margin: 5px 0;
        }
        .property-info .price {
            color: #3f51b5;
            font-weight: bold;
            margin-top: 10px;
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
   
    @if(Auth::user()->role == 1)
    <a href="{{ route('properties.create') }}" style="background-color: #32CD32; color: white; padding: 10px 20px; border-radius: 5px; text-decoration: none; float: right;">
        Tambah Properti Baru
    </a>
@endif


    <!-- Content -->
    <div class="container">
        @if (session('success'))
            <p>{{ session('success') }}</p>
        @endif

        <div class="properties-grid">
            @foreach($properties as $property)
                <a href="{{ route('properties.show', $property->id_properties) }}" class="property-card">
                    <div class="property-image">
                        <img src="{{ asset('storage/' . $property->photo) }}" alt="Foto Properti">
                    </div>
                    <div class="property-info">
                        <h3>{{ $property->name }}</h3>
                        <p>{{ Str::limit($property->deskripsi, 50) }}</p>
                        <p><strong>Lokasi:</strong> {{ $property->alamat }}</p>
                        <p><strong>Kategori:</strong> {{ ucfirst($property->category) }}</p>
                        <p class="price">Rp {{ number_format($property->harga, 2, ',', '.') }}</p>
                    </div>
                </a>
            @endforeach
        </div>
    </div>

    <footer>
        <div class="footer-text">Design by kelompok & web lanjut</div>
    </footer>
</body>
</html>
