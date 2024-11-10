<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddPropertyIdForeignKeyToPemesanan extends Migration
{
    public function up()
    {
        Schema::table('pemesanan', function (Blueprint $table) {
            // Menambahkan foreign key pada property_id
            $table->foreign('property_id')->references('id_properties')->on('properties')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::table('pemesanan', function (Blueprint $table) {
            // Menghapus foreign key constraint jika migrasi dibatalkan
            $table->dropForeign(['property_id']);
        });
    }
}
