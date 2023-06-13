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
        Schema::create('tarif', function (Blueprint $table) {
            $table->id('id_tarif')->unique();
            $table->unsignedBigInteger('id_jenis_pengguna');
            $table->double('biaya_tarif', 14, 2)->nullable(false);
            $table->double('skala_penggunaan', 10, 2)->nullable(false);

            $table->foreign('id_jenis_pengguna')->references('id_jenis_pengguna')->on('jenis_pengguna');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tarif');
    }
};
