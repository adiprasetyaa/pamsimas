<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use DB;

class PetugasTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('petugas_meteran')->insert([
            [
                'id_admin' => 1,
                'id_user' => 5,
                'id_area' => 1, // Sesuaikan dengan id_user yang ingin Anda jadikan sebagai petugas
                'created_at' => now(),
                'updated_at' => now(),
            ],

            [
                'id_admin' => 1,
                'id_user' => 6,
                'id_area' => 2, // Sesuaikan dengan id_user yang ingin Anda jadikan sebagai petugas
                'created_at' => now(),
                'updated_at' => now(),
            ],

            [
                'id_admin' => 1,
                'id_user' => 7,
                'id_area' => 3, // Sesuaikan dengan id_user yang ingin Anda jadikan sebagai petugas
                'created_at' => now(),
                'updated_at' => now(),
            ],

            [
                'id_admin' => 1,
                'id_user' => 8,
                'id_area' => 4, // Sesuaikan dengan id_user yang ingin Anda jadikan sebagai petugas
                'created_at' => now(),
                'updated_at' => now(),
            ],

            [
                'id_admin' => 1,
                'id_user' => 9,
                'id_area' => 5, // Sesuaikan dengan id_user yang ingin Anda jadikan sebagai petugas
                'created_at' => now(),
                'updated_at' => now(),
            ],
            // Tambahkan petugas lainnya sesuai kebutuhan
        ]);
    }
}


