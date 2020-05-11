<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use App\{Pelanggan, Outlet};

class PelangganTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        $faker = Faker::create('id_ID');

        for($i = 1; $i <= 50; $i++){
            Pelanggan::Create([
                'outlet_id' => Outlet::all()->random()->id,
                'nama' => $faker->name,
                'alamat' =>  $faker->address,
                'telepon' => $faker->randomNumber(6)  
            ]);
        }

    }
}
