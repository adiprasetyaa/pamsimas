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
        Schema::create('petugas_meteran', function (Blueprint $table) {
            $table->id('id_petugas')->unique();
            $table->unsignedBigInteger('id_admin');
            $table->string('nama_petugas', 50);
            $table->string('area', 50);

            $table->foreign('id_admin')->references('id_admin')->on('administrator');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('petugas_meteran');
    }
};
