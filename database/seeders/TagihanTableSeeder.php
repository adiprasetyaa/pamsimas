<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;

class TagihanTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('tagihan')->insert([
            // Pelanggan 1
            [
                'id_admin' => 1,
                'id_pelanggan' => 1,
                'id_petugas' => 1,
                'id_kasir' => 1,
                'status' => 'Sudah Lunas',
                'status_tagihan' => "Completed",
                'bulan_penggunaan' => '202301',
                'tanggal_penagihan' => '2023-02-01',
                'created_at' => now(),
                'updated_at' => now(),
            ],

            [
                'id_admin' => 1,
                'id_pelanggan' => 1,
                'id_petugas' => 1,
                'id_kasir' => 1,
                'status' => 'Sudah Lunas',
                'status_tagihan' => "Completed",
                'bulan_penggunaan' => '202302',
                'tanggal_penagihan' => '2023-03-01',
                'created_at' => now(),
                'updated_at' => now(),
            ],

            [
                'id_admin' => 1,
                'id_pelanggan' => 1,
                'id_petugas' => 1,
                'id_kasir' => 1,
                'status_tagihan' => "Completed",
                'status' => 'Belum Lunas',
                'bulan_penggunaan' => '202303',
                'tanggal_penagihan' => '2023-04-01',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            // End Of Pelanggan 1

            // Pelanggan 2
            [
                'id_admin' => 1,
                'id_pelanggan' => 2,
                'id_petugas' => 2,
                'id_kasir' => 2,
                'status_tagihan' => "Completed",
                'status' => 'Sudah Lunas',
                'bulan_penggunaan' => '202301',
                'tanggal_penagihan' => '2023-02-01',
                'created_at' => now(),
                'updated_at' => now(),
            ],

            [
                'id_admin' => 1,
                'id_pelanggan' => 2,
                'id_petugas' => 2,
                'id_kasir' => 2,
                'status_tagihan' => "Completed",
                'status' => 'Belum Lunas',
                'bulan_penggunaan' => '202302',
                'tanggal_penagihan' => '2023-03-01',
                'created_at' => now(),
                'updated_at' => now(),
            ],

            [
                'id_admin' => 1,
                'id_pelanggan' => 2,
                'id_petugas' => 2,
                'id_kasir' => 2,
                'status_tagihan' => "Completed",
                'status' => 'Belum Lunas',
                'bulan_penggunaan' => '202303',
                'tanggal_penagihan' => '2023-04-01',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            // End Of Pelanggan 2

            // Pelanggan 3
            [
                'id_admin' => 1,
                'id_pelanggan' => 3,
                'id_petugas' => 3,
                'id_kasir' => 3,
                'status_tagihan' => "Completed",
                'status' => 'Sudah Lunas',
                'bulan_penggunaan' => '202301',
                'tanggal_penagihan' => '2023-02-01',
                'created_at' => now(),
                'updated_at' => now(),
            ],

            [
                'id_admin' => 1,
                'id_pelanggan' => 3,
                'id_petugas' => 3,
                'id_kasir' => 3,
                'status_tagihan' => "Completed",
                'status' => 'Sudah Lunas',
                'bulan_penggunaan' => '202302',
                'tanggal_penagihan' => '2023-03-01',
                'created_at' => now(),
                'updated_at' => now(),
            ],

            [
                'id_admin' => 1,
                'id_pelanggan' => 3,
                'id_petugas' => 3,
                'id_kasir' => 3,
                'status_tagihan' => "Completed",
                'status' => 'Sedang Diproses',
                'bulan_penggunaan' => '202303',
                'tanggal_penagihan' => '2023-04-01',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            // End Of Pelanggan 3
        ]);
    }
}
