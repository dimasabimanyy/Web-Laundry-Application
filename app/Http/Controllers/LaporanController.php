<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\{Transaksi, Pengeluaran};
use Carbon\Carbon;
use DB;

class LaporanController extends Controller
{
    public function index(){
        // $transaksis = Transaksi::get('total');
        // $trans_date = [];
        // $trans_date = Transaksi::get('tanggal');
        // dd($trans_date);
        // $pengeluarans = Pengeluaran::get();
        // $pengeluarans->where('tanggal','like','%' . $trans_date . '%');
        // echo $pengeluarans;
        // dd($pengeluarans);
        // foreach($pengeluarans as $total){
        //     // echo $total['total'];
        //     // echo sum($total);
        // }
        // dd($total_pengeluaran);

        // $total_pengeluaran = Pengeluaran::select('total')
        // ->join('transaksis', 'transaksis.tanggal', '=', 'pengeluarans.tanggal')
        // ->where('pengeluarans.tanggal', $trans_date)
        // ->get();
    //     $leagues = League::select('league_name')
    // ->join('countries', 'countries.country_id', '=', 'leagues.country_id')
    // ->where('countries.country_name', $country)
    // ->get();
        // dd($total_pengeluaran);

    //     $data = DB::table('city')
    //    ->join('state', 'state.state_id', '=', 'city.state_id')
    //    ->join('country', 'country.country_id', '=', 'state.country_id')
    //    ->select('country.country_name', 'state.state_name', 'city.city_name')
    //    ->get();

        $data = DB::table('transaksis')
       ->join('pengeluarans', 'pengeluarans.tanggal', '=', 'transaksis.tanggal')
       ->select('transaksis.tanggal', 'transaksis.total', 'pengeluarans.total')
       ->get();

         return view('laporan_index', compact('data'));
        
    }
}
