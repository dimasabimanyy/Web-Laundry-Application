<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\{Outlet, Pelanggan, User, Transaksi};

class TransaksiController extends Controller
{
    public function index(Request $request){
    	$transaksi = Transaksi::OrderBy('tanggal');
    	$transaksi = $transaksi->get();
    	$outlet = Outlet::get();
    	$pelanggan = Pelanggan::get();
    	$user = User::get();
    	return view('transaksi_index')->with('data_transaksi',$transaksi)->with('data_outlet',$outlet)->with('data_pelanggan',$pelanggan)->with('data_user',$user);
    }
    public function create(){
    	$data_outlet = Outlet::get();
    	return view('pelanggan_index')->with('data_outlet',$data_outlet);
    }
    public function insert(Request $request){
    	Pelanggan::Create($request->all());
    	return redirect('pelanggan');
    }
    // public function delete(Request $request){
    //     $pelanggan = Pelanggan::FindOrFail($request->id);
    //     $pelanggan->delete($request->all());
    //     return redirect('pelanggan');
    // }
    // public function edit(Request $request){
    //     $data_pelanggan = Pelanggan::FindOrFail($request->acuan);
    //     $data_outlet = Outlet::get();
    //     return view('pelanggan_edit')->with('data_pelanggan',$data_pelanggan)->with('data_outlet',$data_outlet);
    // }
    // public function update(Request $request){
    //     $pelanggan = Pelanggan::findOrFail($request->id);
    //     $pelanggan->update($request->all()); 
    //     return redirect('pelanggan');
    // }
}
