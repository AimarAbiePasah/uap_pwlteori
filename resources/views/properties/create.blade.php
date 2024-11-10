<!-- resources/views/properties/create.blade.php -->
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Properti Baru</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
        }

        h1 {
            text-align: center;
            margin-top: 30px;
            color: #333;
        }

        .form-container {
            width: 50%;
            margin: 0 auto;
            background-color: white;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            margin-top: 50px;
        }

        .form-container div {
            margin-bottom: 15px;
        }

        label {
            font-size: 16px;
            color: #333;
        }

        input[type="text"],
        input[type="number"],
        textarea,
        select,
        input[type="file"] {
            width: 100%;
            padding: 10px;
            margin-top: 5px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        textarea {
            height: 100px;
        }

        button {
            background-color: #4CAF50;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            width: 100%;
            font-size: 16px;
        }

        button:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>
    <h1>Tambah Properti Baru</h1>

    <div class="form-container">
        <!-- Form Create Property -->
        <form action="{{ route('properties.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div>
                <label>Nama Properti:</label>
                <input type="text" name="name" required>
            </div>
            <div>
                <label>Deskripsi:</label>
                <textarea name="deskripsi" required></textarea>
            </div>
            <div>
                <label>Jumlah Kamar Tidur:</label>
                <input type="number" name="jumlah_kamar_tidur" required>
            </div>
            <div>
                <label>Jumlah Kamar Mandi:</label>
                <input type="number" name="jumlah_kamar_mandi" required>
            </div>
            <div>
                <label>Luas (m²):</label>
                <input type="number" name="luas" required>
            </div>
            <div>
                <label>Foto:</label>
                <input type="file" name="photo" required>
            </div>
            <div>
                <label>Harga:</label>
                <input type="number" name="harga" required>
            </div>
            <div>
                <label>Alamat:</label>
                <input type="text" name="alamat" required>
            </div>
            <div>
                <label>Kategori:</label>
                <select name="category" required>
                    <option value="sale">Jual</option>
                    <option value="rent">Sewa</option>
                </select>
            </div>
            <div>
                <label>Ketersediaan:</label>
                <select name="ketersediaan" required>
                    <option value="available">Tersedia</option>
                    <option value="sold">Terjual</option>
                    <option value="rented">Telah Disewa</option>
                </select>
            </div>
            <button type="submit">Simpan Properti</button>
        </form>
    </div>

</body>
</html>
