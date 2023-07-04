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

            // Administrator [1]

            [
                'name' => 'Admin',
                'email' => 'admin@gmail.com',
                'username' => 'admin',
                'password' => Hash::make('123'),
                'role' => 'admin',
            ],
            

            // Kasir [2]
            [
                'name' => 'Kasir 1',
                'email' => 'kasir1@gmail.com',
                'username' => 'kasir1',
                'password' => Hash::make('123'),
                'role' => 'kasir',
            ],

            // Kasir [3]
            [
                'name' => 'Kasir 2',
                'email' => 'kasir2@gmail.com',
                'username' => 'kasir2',
                'password' => Hash::make('123'),
                'role' => 'kasir',
            ],

            // Kasir [4]
            [
                'name' => 'Kasir 3',
                'email' => 'kasir3@gmail.com',
                'username' => 'kasir3',
                'password' => Hash::make('123'),
                'role' => 'kasir',
            ],

            // Petugas Meteran [5]
            [
                'name' => 'Petugas Meteran 1',
                'email' => 'petugasmeteran1@gmail.com',
                'username' => 'petugas1',
                'password' => Hash::make('123'),
                'role' => 'petugas',
            ],

            // Petugas Meteran [6]
            [
                'name' => 'Petugas Meteran 2',
                'email' => 'petugasmeteran2@gmail.com',
                'username' => 'petugas2',
                'password' => Hash::make('123'),
                'role' => 'petugas',
            ],

            // Petugas Meteran [7]
            [
                'name' => 'Petugas Meteran 3',
                'email' => 'petugasmeteran3@gmail.com',
                'username' => 'petugas3',
                'password' => Hash::make('123'),
                'role' => 'petugas',
            ],

            // Petugas Meteran [8]
            [
                'name' => 'Petugas Meteran 4',
                'email' => 'petugasmeteran4@gmail.com',
                'username' => 'petugas4',
                'password' => Hash::make('123'),
                'role' => 'petugas',
            ],

            // Petugas Meteran [9]
            [
                'name' => 'Petugas Meteran 5',
                'email' => 'petugasmeteran5@gmail.com',
                'username' => 'petugas5',
                'password' => Hash::make('123'),
                'role' => 'petugas',
            ],
            
            // Pelanggan [10]
            [
                'name' => 'Pelanggan1',
                'email' => 'pelanggan1@gmail.com',
                'username' => 'pelanggan1',
                'password' => Hash::make('123'),
                'role' => 'pelanggan',
            ],

                        
            // Pelanggan [11]
            [
                'name' => 'Pelanggan2',
                'email' => 'pelanggan2@gmail.com',
                'username' => 'pelanggan2',
                'password' => Hash::make('123'),
                'role' => 'pelanggan',
            ],

                        
            // Pelanggan [12]
            [
                'name' => 'Pelanggan3',
                'email' => 'pelanggan3@gmail.com',
                'username' => 'pelanggan3',
                'password' => Hash::make('123'),
                'role' => 'pelanggan',
            ],
            
        ]);
    }
}
