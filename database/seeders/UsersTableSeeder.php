<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use DB;


class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([

            // Administrator

            [
                'name' => 'Admin',
                'email' => 'admin@gmail.com',
                'username' => 'admin',
                'password' => Hash::make('123'),
                'role' => 'administrator',
            ],
            

            // Pelanggan

            [
                'name' => 'Pelanggan',
                'email' => 'pelanggan@gmail.com',
                'username' => 'pelanggan',
                'password' => Hash::make('123'),
                'role' => 'pelanggan',
            ],
            

            // Petugas Meteran
            [
                'name' => 'Kasir',
                'email' => 'kasir@gmail.com',
                'username' => 'kasir',
                'password' => Hash::make('123'),
                'role' => 'kasir',
            ],

            [
                'name' => 'Petugas Meteran',
                'email' => 'petugasmeteran@gmail.com',
                'username' => 'petugas',
                'password' => Hash::make('123'),
                'role' => 'petugas',
            ],
            

            
        ]);
    }
}
