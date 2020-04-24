<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\{Transaksi, Pengeluaran};

class LaporanController extends Controller
{
    public function index(){
        $data_pengeluaran = Pengeluaran::paginate(20);
    	$data_transaksi = Transaksi::get();
    	return view('laporan_index')->with('data_pengeluaran',$data_pengeluaran)->with('data_transaksi',$data_transaksi);
    }
}
