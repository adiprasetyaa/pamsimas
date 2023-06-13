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
        Schema::create('tagihan', function (Blueprint $table) {
            $table->id('id_tagihan')->unique();
            $table->unsignedBigInteger('id_admin');
            $table->unsignedBigInteger('id_pelanggan');
            $table->unsignedBigInteger('id_petugas');
            $table->unsignedBigInteger('id_kasir');
            $table->string('status', 15)->nullable(false);
            $table->double('meteran', 10, 2)->nullable(false);
            $table->string('bulan_penggunaan',6)->nullable(false);
            $table->datetime('tanggal_penagihan')->nullable(false);
            $table->double('jumlah_tagihan', 17, 2)->nullable(false);

            $table->foreign('id_admin')->references('id_admin')->on('administrator');
            $table->foreign('id_petugas')->references('id_petugas')->on('petugas_meteran');
            $table->foreign('id_pelanggan')->references('id_pelanggan')->on('pelanggan');
            $table->foreign('id_kasir')->references('id_kasir')->on('kasir');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tagihan');
    }
};
