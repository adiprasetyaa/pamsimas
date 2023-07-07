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
        Schema::create('pembayaran', function (Blueprint $table) {
            $table->id('id_pembayaran')->unique();
            $table->unsignedBigInteger('id_pelanggan');
            $table->unsignedBigInteger('id_kasir')->nullable();
            $table->unsignedBigInteger('id_tagihan');
            $table->datetime('tanggal_pembayaran')->nullable();
            $table->double('jumlah_pembayaran', 17, 2)->nullable(false)->default(0);
            $table->string('bukti_pembayaran', 100)->nullable();

            $table->foreign('id_pelanggan')->references('id_pelanggan')->on('pelanggan');
            $table->foreign('id_kasir')->references('id_kasir')->on('kasir');
            $table->foreign('id_tagihan')->references('id_tagihan')->on('tagihan');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pembayaran');
    }
};