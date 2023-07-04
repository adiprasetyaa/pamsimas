<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use DB;

class KasirTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('kasir')->insert([

            // kasir 1
            [
                'id_user' => 2,
                'id_admin' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],

            // kasir 2
            [
                'id_user' => 3,
                'id_admin' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],

            // kasir 3
            [
                'id_user' => 4,
                'id_admin' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
