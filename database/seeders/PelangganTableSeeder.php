<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use DB;

class PelangganTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('pelanggan')->insert([

            [
                'id_user' => 10,
                'id_admin' => 1,
                'id_jenis_pengguna' => 1,
                'id_petugas' => 1,
                'id_area' => 1,
            ],

            [
                'id_user' => 11,
                'id_admin' => 1,
                'id_jenis_pengguna' => 2,
                'id_petugas' => 2,
                'id_area' => 2,
            ],

            [
                'id_user' => 12,
                'id_admin' => 1,
                'id_jenis_pengguna' => 3,
                'id_petugas' => 3,
                'id_area' => 3,
            ],
        ]);


    }
}
