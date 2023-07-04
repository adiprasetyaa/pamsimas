<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use DB;

class TarifTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('tarif')->insert([

            // Sosial Umum
            [
                // 1
                'id_jenis_pengguna' => 1,
                'biaya_tarif' =>  2800,
                'minimum' => 0,
                'maximum' => 10,
                'created_at' => now(),
                'updated_at' => now(),
            ],

            [
                // 2
                'id_jenis_pengguna' => 1,
                'biaya_tarif' =>  2800,
                'minimum' => 11,
                'maximum' => 20,
                'created_at' => now(),
                'updated_at' => now(),
            ],

            [
                // 3
                'id_jenis_pengguna' => 1,
                'biaya_tarif' =>  2800,
                'minimum' => 21,
                'maximum' => 30,
                'created_at' => now(),
                'updated_at' => now(),
            ],

            [
                // 4
                'id_jenis_pengguna' => 1,
                'biaya_tarif' =>  2800,
                'minimum' => 30,
                'maximum' => PHP_INT_MAX,
                'created_at' => now(),
                'updated_at' => now(),
            ], 
            // end of Sosial Umum


            // Sosial Khusus
            [
                // 1
                'id_jenis_pengguna' => 2,
                'biaya_tarif' =>  2800,
                'minimum' => 0,
                'maximum' => 10,
                'created_at' => now(),
                'updated_at' => now(),
            ],

            [
                // 2
                'id_jenis_pengguna' => 2,
                'biaya_tarif' =>  3000,
                'minimum' => 11,
                'maximum' => 20,
                'created_at' => now(),
                'updated_at' => now(),
            ],

            [
                // 3
                'id_jenis_pengguna' => 2,
                'biaya_tarif' =>  3200,
                'minimum' => 21,
                'maximum' => 30,
                'created_at' => now(),
                'updated_at' => now(),
            ],

            [
                // 4
                'id_jenis_pengguna' => 2,
                'biaya_tarif' =>  3400,
                'minimum' => 30,
                'maximum' => PHP_INT_MAX,
                'created_at' => now(),
                'updated_at' => now(),
            ], 
            // end of Sosial Khusus

            // Rumah Tangga I
            [
                // 1
                'id_jenis_pengguna' => 3,
                'biaya_tarif' =>  3550,
                'minimum' => 0,
                'maximum' => 10,
                'created_at' => now(),
                'updated_at' => now(),
            ],

            [
                // 2
                'id_jenis_pengguna' => 3,
                'biaya_tarif' =>  3750,
                'minimum' => 11,
                'maximum' => 20,
                'created_at' => now(),
                'updated_at' => now(),
            ],

            [
                // 3
                'id_jenis_pengguna' => 3,
                'biaya_tarif' =>  3950,
                'minimum' => 21,
                'maximum' => 30,
                'created_at' => now(),
                'updated_at' => now(),
            ],

            [
                // 4
                'id_jenis_pengguna' => 3,
                'biaya_tarif' =>  4150,
                'minimum' => 30,
                'maximum' => PHP_INT_MAX,
                'created_at' => now(),
                'updated_at' => now(),
            ], 
            // end of Rumah Tangga I

            // Rumah Tangga II
            [
                // 1
                'id_jenis_pengguna' => 4,
                'biaya_tarif' =>  3700,
                'minimum' => 0,
                'maximum' => 10,
                'created_at' => now(),
                'updated_at' => now(),
            ],

            [
                // 2
                'id_jenis_pengguna' => 4,
                'biaya_tarif' =>  3900,
                'minimum' => 11,
                'maximum' => 20,
                'created_at' => now(),
                'updated_at' => now(),
            ],

            [
                // 3
                'id_jenis_pengguna' => 4,
                'biaya_tarif' =>  4100,
                'minimum' => 21,
                'maximum' => 30,
                'created_at' => now(),
                'updated_at' => now(),
            ],

            [
                // 4
                'id_jenis_pengguna' => 4,
                'biaya_tarif' =>  4300,
                'minimum' => 30,
                'maximum' => PHP_INT_MAX,
                'created_at' => now(),
                'updated_at' => now(),
            ], 
            // end of Rumah Tangga II

            // Rumah Tangga III
            [
                // 1
                'id_jenis_pengguna' => 5,
                'biaya_tarif' =>  3900,
                'minimum' => 0,
                'maximum' => 10,
                'created_at' => now(),
                'updated_at' => now(),
            ],

            [
                // 2
                'id_jenis_pengguna' => 5,
                'biaya_tarif' =>  4100,
                'minimum' => 11,
                'maximum' => 20,
                'created_at' => now(),
                'updated_at' => now(),
            ],

            [
                // 3
                'id_jenis_pengguna' => 4,
                'biaya_tarif' =>  4300,
                'minimum' => 21,
                'maximum' => 30,
                'created_at' => now(),
                'updated_at' => now(),
            ],

            [
                // 4
                'id_jenis_pengguna' => 4,
                'biaya_tarif' =>  4500,
                'minimum' => 30,
                'maximum' => PHP_INT_MAX,
                'created_at' => now(),
                'updated_at' => now(),
            ], 
            // end of Rumah Tangga III

            // Rumah Tangga IV
            [
                // 1
                'id_jenis_pengguna' => 6,
                'biaya_tarif' =>  4100,
                'minimum' => 0,
                'maximum' => 10,
                'created_at' => now(),
                'updated_at' => now(),
            ],

            [
                // 2
                'id_jenis_pengguna' => 6,
                'biaya_tarif' =>  4300,
                'minimum' => 11,
                'maximum' => 20,
                'created_at' => now(),
                'updated_at' => now(),
            ],

            [
                // 3
                'id_jenis_pengguna' => 6,
                'biaya_tarif' =>  4500,
                'minimum' => 21,
                'maximum' => 30,
                'created_at' => now(),
                'updated_at' => now(),
            ],

            [
                // 4
                'id_jenis_pengguna' => 6,
                'biaya_tarif' =>  4700,
                'minimum' => 30,
                'maximum' => PHP_INT_MAX,
                'created_at' => now(),
                'updated_at' => now(),
            ], 
            // end of Rumah Tangga IV

        ]);
    }
}
