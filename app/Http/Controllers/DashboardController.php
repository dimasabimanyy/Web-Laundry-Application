<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\{Outlet, Transaksi, Pengeluaran};
use Carbon\Carbon;

class DashboardController extends Controller
{
    public function index(){
    	$jlh_outlet = Outlet::get('nama');
    	$jlh_transaksi = Transaksi::get('id');

    	// $data = Outlet::get();
		// 	for ($i=1; $i<=12; $i++) {
   	 	// 	$data_out = $data->where('month', $i);
		// 	}

		// 	$month = Outlet::now()->addMonth(1)->format('m');
		// 	$data_outlet = Outlet::get('nama')->whereMonth($month);

			$now = Carbon::now();
			$month = $now->month;
			$year = $now->year;
			$day = $now->day;
			
			// $transaksi = Transaksi::get('id');
			// $transaksi = $transaksi->where('month',$now);
			// Transaksi::get('id')->whereMonth();
			
			//Get Prev Month
			$prev_month = $month - 1;

			//Transaksi this month
			$transaksi = Transaksi::whereMonth('created_at',$month)->get();	
			//Transaksi prev month
			$transaksi_prev_month = Transaksi::whereMonth('created_at',$prev_month)->get();	

			$pengeluaran = Pengeluaran::whereMonth('created_at', $month)->get('total');
			$pengeluaran_prev_month = Pengeluaran::whereMonth('created_at',$prev_month)->get();
			//Pengeluaran this month
			$pengeluaran = number_format($pengeluaran->sum('total'));
			//Pengeluaran prev month
			$pengeluaran_prev_month = number_format($pengeluaran_prev_month->sum('total'));

			//Pendapatan this month
			$pendapatan = number_format($transaksi->sum('total'));
			//Pendapatan prev month
			$pendapatan_prev_month = number_format($transaksi_prev_month->sum('total'));

			//Get Year and Months
			$this_year = $year;
			$jan = Transaksi::whereMonth('created_at',1)->whereYear('created_at',$this_year)->get();
			$feb = Transaksi::whereMonth('created_at',2)->whereYear('created_at',$this_year)->get();
			$mar = Transaksi::whereMonth('created_at',3)->whereYear('created_at',$this_year)->get();
			$apr = Transaksi::whereMonth('created_at',4)->whereYear('created_at',$this_year)->get();
			$mei = Transaksi::whereMonth('created_at',5)->whereYear('created_at',$this_year)->get();
			$jun = Transaksi::whereMonth('created_at',6)->whereYear('created_at',$this_year)->get();
			$jul = Transaksi::whereMonth('created_at',7)->whereYear('created_at',$this_year)->get();
			$aug = Transaksi::whereMonth('created_at',8)->whereYear('created_at',$this_year)->get();
			$sept = Transaksi::whereMonth('created_at',9)->whereYear('created_at',$this_year)->get();
			$oct = Transaksi::whereMonth('created_at',10)->whereYear('created_at',$this_year)->get();
			$nov = Transaksi::whereMonth('created_at',11)->whereYear('created_at',$this_year)->get();
			$dec = Transaksi::whereMonth('created_at',12)->whereYear('created_at',$this_year)->get();
			//Pendapatan Perbulan
			$pen_jan = $jan->sum('total');
			$pen_feb = $feb->sum('total');
			$pen_mar = $mar->sum('total');
			$pen_apr = $apr->sum('total');
			$pen_mei = $mei->sum('total');
			$pen_jun = $jun->sum('total');
			$pen_jul = $jul->sum('total');
			$pen_aug = $aug->sum('total');
			$pen_sept = $sept->sum('total');
			$pen_oct = $oct->sum('total');
			$pen_nov = $nov->sum('total');
			$pen_dec = $dec->sum('total');

    	return view('dashboard',compact('jlh_outlet','jlh_transaksi','pengeluaran','pendapatan','pendapatan_prev_month','pengeluaran_prev_month','transaksi_prev_month','pen_jan','pen_feb','pen_mar','pen_apr','pen_mei','pen_jun','pen_jul','pen_aug','pen_sept','pen_oct','pen_nov','pen_dec'));
    }
}
