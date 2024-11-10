<?php

// app/Http/Controllers/ProfileController.php

namespace App\Http\Controllers;

use App\Models\Property;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->except(['showLogin', 'showRegister', 'register', 'login']);
    }

    public function showLogin()
    {
        if (auth()->check()) {
            $user = auth()->user();
    
            // Arahkan ke dashboard yang sesuai berdasarkan peran
            if ($user->role == 1) {
                return redirect()->route('admin_dashboard');
            } else {
                return redirect()->route('user_dashboard');
            }
        }
    
        return view('login');
    }
    

public function showRegister()
{
    // Jika sudah login, redirect ke dashboard
   

    return view('register');
}


    // Fungsi untuk registrasi
    public function register(Request $request)
    {
        // Ambil data role yang ada di tabel users
       
        
        // Validasi form
        $request->validate([
            'username' => 'required|unique:users,username',
            'password' => 'required',
            'name' => 'required',
            'role' => 'required|in:0,1', // Validasi hanya 0 atau 1
        ]);
    
        // Ubah role menjadi boolean
        $role = (bool) $request->role;
    
        // Simpan data pengguna baru
        User::create([
            'username' => $request->username,
            'password' => Hash::make($request->password),
            'name' => $request->name,
            'role' => $role, // Simpan role sebagai boolean
        ]);
    
        // Redirect ke halaman login setelah registrasi berhasil
        return redirect()->route('login')->with('success', 'Registration successful. Please log in.');
    }

    

    // Fungsi untuk login
    // app/Http/Controllers/ProfileController.php

public function login(Request $request)
{
    $request->validate([
        'username' => 'required',
        'password' => 'required',
    ]);

    $credentials = $request->only('username', 'password');

    // Autentikasi pengguna
    if (Auth::attempt($credentials)) {
        $user = Auth::user();
        
        // Cek peran pengguna berdasarkan role
        if ($user->role == 1) {
            return redirect()->route('admin_dashboard');
        } else {
            return redirect()->route('user_dashboard');
        }
    }

    // Jika login gagal
    return redirect()->route('login')->with('error', 'Username atau password salah');
}


    // Fungsi untuk logout
    public function logout()
    {
        Auth::logout();
        return redirect()->route('login')->with('success', 'Anda berhasil logout');
    }




}



