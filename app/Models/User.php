<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    // Tambahkan role ke dalam fillable agar bisa diisi melalui mass assignment
    protected $fillable = [
        'username',
        'password',
        'name',
        'role',  // Menambahkan kolom role
    ];

    // Kolom yang disembunyikan saat diambil dari database (seperti saat di-JSON-kan)
    protected $hidden = [
        'password',
    ];
}

