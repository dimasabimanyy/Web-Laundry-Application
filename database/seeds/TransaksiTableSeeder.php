<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use App\{Transaksi, Pelanggan, Outlet};
use Carbon\Carbon;

class TransaksiTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create('id_ID');
        $current = Carbon::now();
        $this_year = $current->year;
        
        //January
        Transaksi::Create([
            'pelanggan_id' => Pelanggan::all()->random()->id,
            'outlet_id' => Outlet::all()->random()->id,
            'status' => 'baru',
            'tanggal' => $this_year . '-01' . '-01',
            'dibayar' => 'sudah_dibayar',
            'total' => '768000',
            'created_at' => $this_year . '-01' . '-01'
        ]);
        // February
        Transaksi::Create([
            'pelanggan_id' => Pelanggan::all()->random()->id,
            'outlet_id' => Outlet::all()->random()->id,
            'status' => 'proses',
            'tanggal' => $this_year . '-02' . '-23',
            'dibayar' => 'sudah_dibayar',
            'total' => '867000',
            'created_at' => $this_year . '-02' . '-23'
        ]);
        //March
        Transaksi::Create([
            'pelanggan_id' => Pelanggan::all()->random()->id,
            'outlet_id' => Outlet::all()->random()->id,
            'status' => 'proses',
            'tanggal' => $this_year . '-03' . '-21',
            'dibayar' => 'belum_dibayar',
            'total' => '758000',
            'created_at' => $this_year . '-03' . '-21'
        ]);
        //April
        Transaksi::Create([
            'pelanggan_id' => Pelanggan::all()->random()->id,
            'outlet_id' => Outlet::all()->random()->id,
            'status' => 'baru',
            'tanggal' => $this_year . '-04' . '-04',
            'dibayar' => 'belum_dibayar',
            'total' => '869500',
            'created_at' => $this_year . '-04' . '-04'
        ]);
        //Mei
        Transaksi::Create([
            'pelanggan_id' => Pelanggan::all()->random()->id,
            'outlet_id' => Outlet::all()->random()->id,
            'status' => 'baru',
            'tanggal' => $this_year . '-05' . '-05',
            'dibayar' => 'belum_dibayar',
            'total' => '749000',
            'created_at' => $this_year . '-05' . '-05'
        ]);
        //June
        Transaksi::Create([
            'pelanggan_id' => Pelanggan::all()->random()->id,
            'outlet_id' => Outlet::all()->random()->id,
            'status' => 'baru',
            'tanggal' => $this_year . '-06' . '-06',
            'dibayar' => 'belum_dibayar',
            'total' => '937000',
            'created_at' => $this_year . '-06' . '-06'
        ]);
        //July
        Transaksi::Create([
            'pelanggan_id' => Pelanggan::all()->random()->id,
            'outlet_id' => Outlet::all()->random()->id,
            'status' => 'baru',
            'tanggal' => $this_year . '-07' . '-07',
            'dibayar' => 'belum_dibayar',
            'total' => '780000',
            'created_at' => $this_year . '-07' . '-07'
        ]);
        //August
        Transaksi::Create([
            'pelanggan_id' => Pelanggan::all()->random()->id,
            'outlet_id' => Outlet::all()->random()->id,
            'status' => 'baru',
            'tanggal' => $this_year . '-08' . '-08',
            'dibayar' => 'belum_dibayar',
            'total' => '750000',
            'created_at' => $this_year . '-08' . '-08'
        ]);
        //September
        Transaksi::Create([
            'pelanggan_id' => Pelanggan::all()->random()->id,
            'outlet_id' => Outlet::all()->random()->id,
            'status' => 'baru',
            'tanggal' => $this_year . '-09' . '-06',
            'dibayar' => 'belum_dibayar',
            'total' => '875000',
            'created_at' => $this_year . '-09' . '-06'
        ]);
        //October
        Transaksi::Create([
            'pelanggan_id' => Pelanggan::all()->random()->id,
            'outlet_id' => Outlet::all()->random()->id,
            'status' => 'baru',
            'tanggal' => $this_year . '-10' . '-04',
            'dibayar' => 'belum_dibayar',
            'total' => '795000',
            'created_at' => $this_year . '-10' . '-4'
        ]);
        //November
        Transaksi::Create([
            'pelanggan_id' => Pelanggan::all()->random()->id,
            'outlet_id' => Outlet::all()->random()->id,
            'status' => 'baru',
            'tanggal' => $this_year . '-11' . '-23',
            'dibayar' => 'belum_dibayar',
            'total' => '955000',
            'created_at' => $this_year . '-11' . '-23'
        ]);
        //December
        Transaksi::Create([
            'pelanggan_id' => Pelanggan::all()->random()->id,
            'outlet_id' => Outlet::all()->random()->id,
            'status' => 'baru',
            'tanggal' => $this_year . '-12' . '-12',
            'dibayar' => 'belum_dibayar',
            'total' => '1200000',
            'created_at' => $this_year . '-12' . '-12'
        ]);
        
    }
}
