<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AdminTableSeeder extends Seeder
{
        /**
         * Run the database seeds.
         */
        public function run()
        {
                DB::table('admin')->insert([
                        [
                        'id_user' => 1, // Sesuaikan dengan id_user yang ingin Anda jadikan sebagai admin
                        'created_at' => now(),
                        'updated_at' => now(),
                        ],
                ]);
        }

}
