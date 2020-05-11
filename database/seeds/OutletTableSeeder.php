<?php

use Illuminate\Database\Seeder;
use App\Outlet;

class OutletTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Outlet::Create([
            'nama' => 'Rumah Laundry',
            'alamat' =>  'Jl. Sutoyo, Kota Tebing Tinggi, Sumatera Utara',
            'telepon' => '08726238327'  
        ]);
        Outlet::Create([
            'nama' => 'Ummi Laundry',
            'alamat' =>  'Jl. Pusara Pejuang No.14, Kota Medan, Sumatera Utara',
            'telepon' => '08327125341'  
        ]);
        Outlet::Create([
            'nama' => 'Indo Laundry',
            'alamat' =>  'Jl. M.H. Thamrin, Sibolangit, Sumatera Utara',
            'telepon' => '08625182345'  
        ]);
        Outlet::Create([
            'nama' => 'Sahabat Laundry',
            'alamat' =>  'Jl. Lintas Sumatera, Kota Medan Sumatera Utara',
            'telepon' => '08981273130'  
        ]);
        Outlet::Create([
            'nama' => 'Pelangi Laundry',
            'alamat' =>  'Jl. Sisingamangaraja No. 05, Kota Siantar Sumatera Utara',
            'telepon' => '08897618299'  
        ]);
        
    }
}
