<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('pelanggan', function (Blueprint $table) {
            $table->id('id_pelanggan')->unique();
            $table->unsignedBigInteger('id_admin');
            $table->unsignedBigInteger('id_jenis_pengguna');
            $table->unsignedBigInteger('id_user');
            $table->unsignedBigInteger('id_petugas');
            $table->unsignedBigInteger('id_area');
            
            $table->foreign('id_area')->references('id_area')->on('area');
            $table->foreign('id_user')->references('id_user')->on('users');
            $table->foreign('id_admin')->references('id_admin')->on('admin');
            $table->foreign('id_jenis_pengguna')->references('id_jenis_pengguna')->on('jenis_pengguna');
            $table->foreign('id_petugas')->references('id_petugas')->on('petugas_meteran');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pelanggan');
    }
};
