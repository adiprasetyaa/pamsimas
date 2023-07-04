<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use DB;

class JenisPenggunaTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('jenis_pengguna')->insert([
            [
                // 1
                'nama_jenis_pengguna' => 'Sosial Umum',
                'id_admin' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],

            [
                // 2
                'nama_jenis_pengguna' => 'Sosial Khusus',
                'id_admin' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],

            [
                // 3
                'nama_jenis_pengguna' => 'Rumah Tangga I',
                'id_admin' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],

            [
                // 4
                'nama_jenis_pengguna' => 'Rumah Tangga II',
                'id_admin' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],

            [
                // 5
                'nama_jenis_pengguna' => 'Rumah Tangga III',
                'id_admin' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],

            [
                // 6
                'nama_jenis_pengguna' => 'Rumah Tangga IV',
                'id_admin' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],


            // Tambahkan petugas lainnya sesuai kebutuhan
        ]);
    }
}




