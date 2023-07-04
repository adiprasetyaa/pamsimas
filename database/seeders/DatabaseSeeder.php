<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call(UsersTableSeeder::class);

        $this->call(AreaTableSeeder::class);      

        $this->call(AdminTableSeeder::class);

        $this->call(JenisPenggunaTableSeeder::class);
        
        $this->call(TarifTableSeeder::class);

        $this->call(PetugasTableSeeder::class);

        $this->call(KasirTableSeeder::class);

        $this->call(PelangganTableSeeder::class);

        $this->call(TagihanTableSeeder::class);

        $this->call(PembayaranTableSeeder::class);
    }
}
