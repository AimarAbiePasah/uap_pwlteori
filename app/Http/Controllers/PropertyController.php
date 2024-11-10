<?php

namespace App\Http\Controllers;

use App\Models\Property;
use Illuminate\Http\Request;

class PropertyController extends Controller
{
    public function index()
{
    $properties = Property::paginate(10);  // Adjust pagination as needed
    return view('properties.index', compact('properties'));
}


    public function create()
    {
        return view('properties.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'deskripsi' => 'required|string',
            'jumlah_kamar_tidur' => 'required|integer',
            'jumlah_kamar_mandi' => 'required|integer',
            'luas' => 'required|integer',
            'photo' => 'required|image|mimes:jpg,jpeg,png|max:2048',
            'harga' => 'required|numeric|between:0,999999999999.99',
            'alamat' => 'required|string',
            'category' => 'required|in:sale,rent',
            'ketersediaan' => 'required|in:available,sold,rented',
        ]);

        $photoPath = $request->file('photo')->store('photos', 'public');

        Property::create([
            'name' => $request->name,
            'deskripsi' => $request->deskripsi,
            'jumlah_kamar_tidur' => $request->jumlah_kamar_tidur,
            'jumlah_kamar_mandi' => $request->jumlah_kamar_mandi,
            'luas' => $request->luas,
            'photo' => $photoPath,
            'harga' => $request->harga,
            'alamat' => $request->alamat,
            'category' => $request->category,
            'ketersediaan' => $request->ketersediaan,
        ]);

        return redirect()->route('properties.index')->with('success', 'Properti berhasil ditambahkan.');
    }

    public function show($id)
{
    $property = Property::findOrFail($id);
    return view('properties.show', compact('property'));
}


    public function edit(Property $property)
    {
        return view('properties.edit', compact('property'));
    }

    public function update(Request $request, Property $property)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'deskripsi' => 'required',
            'jumlah_kamar_tidur' => 'required|integer',
            'jumlah_kamar_mandi' => 'required|integer',
            'luas' => 'required|integer',
            'photo' => 'required|string',
            'harga' => 'required|numeric',
            'alamat' => 'required|string',
            'category' => 'required|in:sale,rent',
            'ketersediaan' => 'required|in:available,sold,rented',
        ]);
        $property->update($request->all());
        return redirect()->route('properties.index')->with('success', 'Property updated successfully');
    }

    public function destroy($id)
{
    $property = Property::findOrFail($id); // Mendapatkan data properti berdasarkan ID
    $property->forceDelete(); // Menghapus properti secara permanen
    return redirect()->route('properties.index')->with('success', 'Property deleted successfully');
}




    // Menampilkan Form Pembelian Properti
    public function purchaseForm($id)
    {
        $property = Property::findOrFail($id);
        return view('properties.purchase', compact('property'));
    }

    // Memproses Pembelian Properti
    public function purchase(Request $request, $id)
    {
        $property = Property::findOrFail($id);

        // Validasi form pembelian (contoh: nama pembeli, kontak, dll)
        $request->validate([
            'buyer_name' => 'required|string|max:255',
            'contact' => 'required|string|max:255',
            'payment_method' => 'required|string',
        ]);

        // Logika untuk memproses pembelian (misalnya menyimpan data transaksi ke database)
        // ...

        // Ubah status properti menjadi sold atau rented
        $property->update(['ketersediaan' => 'sold']);

        return redirect()->route('properties.index')->with('success', 'Pembelian berhasil diproses.');
    }
    public function showAdminDashboard()
    {
        // Mengambil semua properti untuk admin
        $properties = Property::paginate(10);  // Sesuaikan jumlah properti yang ingin ditampilkan per halaman
        return view('admin_dashboard', compact('properties'));  // Mengirimkan data properti ke view
    }

    // Menampilkan dashboard user
    public function showUserDashboard()
    {
        // Mengambil properti dengan kategori tertentu untuk user
        $properties = Property::where('category', 'sale')->paginate(10);  // Atau 'rent' sesuai kebutuhan
        return view('user_dashboard', compact('properties'));  // Mengirimkan data properti ke view
    }

    
}
