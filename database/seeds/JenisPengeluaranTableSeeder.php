<?php

use Illuminate\Database\Seeder;
use App\JenisPengeluaran;

class JenisPengeluaranTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        JenisPengeluaran::Create([
            'nama' => 'Detergen',
        ]);
        JenisPengeluaran::Create([
            'nama' => 'Liquid Cair',
        ]);
        JenisPengeluaran::Create([
            'nama' => 'Hanger Plastik',
        ]);
        JenisPengeluaran::Create([
            'nama' => 'Setrika',
        ]);
        JenisPengeluaran::Create([
            'nama' => 'Ember / Bak cucian',
        ]);
        JenisPengeluaran::Create([
            'nama' => 'Dispenser',
        ]);
        JenisPengeluaran::Create([
            'nama' => 'Spanduk banner',
        ]);
        JenisPengeluaran::Create([
            'nama' => 'Mesin Cuci',
        ]);
    }
}
