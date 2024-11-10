<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePropertiesTable extends Migration
{
    public function up()
    {
        Schema::create('properties', function (Blueprint $table) {
            $table->id('id_properties');
            $table->string('name');
            $table->text('deskripsi');
            $table->integer('jumlah_kamar_tidur');
            $table->integer('jumlah_kamar_mandi');
            $table->integer('luas');
            $table->string('photo');
            $table->decimal('harga', 15, 2);
            $table->string('alamat');
            $table->enum('category', ['sale', 'rent']);
            $table->enum('ketersediaan', ['available', 'sold', 'rented']);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('properties');
    }
}
