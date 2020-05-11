<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use App\{Pengeluaran, Outlet, JenisPengeluaran};

class PengeluaranTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create('id_ID');

        for($i = 1; $i <= 16; $i++){
            Pengeluaran::Create([
                'outlet_id' => Outlet::all()->random()->id,
                'tanggal' => $faker->date,
                'jenis_pengeluaran_id' => JenisPengeluaran::all()->random()->id,
                'total' => $faker->randomNumber(5),
                'keterangan' => 'Ex Membeli 3 unit produk di toko sebelah.'
            ]);
        }
    }
}
