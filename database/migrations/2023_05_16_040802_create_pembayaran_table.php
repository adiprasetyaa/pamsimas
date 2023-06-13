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
            $table->unsignedBigInteger('id_kasir');
            $table->datetime('tanggal_pembayaran')->nullable(false);
            $table->double('jumlah_pembayaran', 17, 2)->nullable(false);
            $table->string('bukti_pembayaran', 50)->nullable(false);

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
        Schema::dropIfExists('pembayaran');
    }
};
