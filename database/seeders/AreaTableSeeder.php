<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use DB;

class AreaTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('area')->insert([


            [
                'nama_area' => 'Jebres',
            ],

            [
                'nama_area' => 'Jagalan',
            ],

            [
                'nama_area' => 'Pucang Sawit',
            ],

            [
                'nama_area' => 'Kratonan',
            ],

            [
                'nama_area' => 'Kerten',
            ],
            
            [
                'nama_area' => 'Purwosari',
            ],

        ]);
    }
}
