<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Faker\Generator as Faker;
use Illuminate\Support\Facades\DB;


class PetugasMeteranFactory extends Factory{
    
    public function definition()
    {
        // $admin = DB::table('admin')->pluck('id_admin')->first();
        // $users = DB::table('users')->where('role', 'petugas')->pluck('id_user')->all();
    
        // return [
        //     'id_admin' => $admin,
        //     'id_user' => $this->faker->randomElement($users),
        //     'area' => $this->faker->randomElement(['Banjarsari', 'Jebres', 'Laweyan', 'Pasar Kliwon', 'Serengan']),
        // ];
    }
}


