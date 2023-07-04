<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use DB;

class PembayaranTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('pembayaran')->insert([
            [
                'id_pelanggan' => 1,
                'id_tagihan' => 1,
                'id_kasir' => 1,
                'tanggal_pembayaran' => '2023-02-03',
                'created_at' => now(),
                'updated_at' => now(),
            ],

            [
                'id_pelanggan' => 1,
                'id_tagihan' => 2,
                'id_kasir' => 1,
                'tanggal_pembayaran' => '2023-03-04',
                'created_at' => now(),
                'updated_at' => now(),
            ],

            [
                'id_pelanggan' => 2,
                'id_tagihan' => 4,
                'id_kasir' => 2,
                'tanggal_pembayaran' => '2023-02-05',
                'created_at' => now(),
                'updated_at' => now(),
            ],

            [
                'id_pelanggan' => 3,
                'id_tagihan' => 7,
                'id_kasir' => 3,
                'tanggal_pembayaran' => '2023-02-07',
                'created_at' => now(),
                'updated_at' => now(),
            ],

            [
                'id_pelanggan' => 3,
                'id_tagihan' => 8,
                'id_kasir' => 3,
                'tanggal_pembayaran' => '2023-02-04',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
