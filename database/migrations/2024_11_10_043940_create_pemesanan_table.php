<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePemesananTable extends Migration
{
    public function up()
    {
        Schema::create('pemesanan', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('property_id');  // Kolom untuk menyimpan ID properti yang dipesan
            $table->unsignedBigInteger('user_id');      // Kolom untuk menyimpan ID user yang melakukan pemesanan
            $table->date('tanggal_pemesanan');          // Kolom untuk menyimpan tanggal pemesanan
            $table->enum('status', ['pending', 'confirmed', 'completed', 'canceled']);  // Status pemesanan
            $table->timestamps();

            // Menambahkan foreign key constraint ke tabel properties
            $table->foreign('property_id')->references('id_properties')->on('properties')->onDelete('cascade');

            // Menambahkan foreign key constraint ke tabel users (pastikan tabel users ada)
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('pemesanan');
    }
}
