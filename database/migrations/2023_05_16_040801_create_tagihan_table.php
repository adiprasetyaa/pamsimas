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
            $table->id('id_tagihan');
            $table->unsignedBigInteger('id_admin');
            $table->unsignedBigInteger('id_pelanggan');
            $table->unsignedBigInteger('id_petugas');
            $table->unsignedBigInteger('id_kasir')->nullable();
            $table->enum('status', ['Belum Lunas', 'Sedang Diproses', 'Sudah Lunas'])->nullable(false)->default('Belum Lunas');
            $table->enum('status_tagihan',['Pending','Completed','Sent'])->nullable(false)->default('Pending');
            $table->double('meteran', 10, 2)->nullable();
            $table->char('bulan_penggunaan',6)->nullable();
            $table->date('tanggal_penagihan')->nullable();
            $table->double('jumlah_tagihan', 17, 2)->nullable(false)->default(0);

            $table->foreign('id_admin')->references('id_admin')->on('admin');
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
