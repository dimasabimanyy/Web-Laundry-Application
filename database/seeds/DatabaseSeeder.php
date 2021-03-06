<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UsersTableSeeder::class);
        $this->call(OutletTableSeeder::class);
        $this->call(PelangganTableSeeder::class);
        $this->call(TransaksiTableSeeder::class);
        $this->call(JenisPengeluaranTableSeeder::class);
        $this->call(PengeluaranTableSeeder::class);
    }
}
