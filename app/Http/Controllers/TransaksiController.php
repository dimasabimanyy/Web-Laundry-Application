<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\{Outlet, Pelanggan, User, Transaksi};

class TransaksiController extends Controller
{
    public function index(){
    	$transaksi = Transaksi::OrderBy('tanggal','desc');
    	$data_transaksi = $transaksi->paginate(20);
    	$data_outlet = Outlet::get();
    	$data_pelanggan = Pelanggan::get();

        return view('transaksi_index', compact('data_transaksi','data_outlet','data_pelanggan'));
    }
    public function create(){
    	$data_outlet = Outlet::get();
        $data_pelanggan = Pelanggan::get();
        
        // auth()->user()->notify(new TransaksiHappened());
    	return view('transaksi_index')->with('data_outlet',$data_outlet)->with('data_pelanggan',$data_pelanggan);
    }
    public function insert(Request $request){
        Transaksi::Create([
            'outlet_id' => $request['outlet_id'],
            'kode_invoice' => $request['kode_invoice'],
            'pelanggan_id' => $request['pelanggan_id'],
            'tanggal' => $request['tanggal'],
            'status' => $request['status'],
            'dibayar' => $request['dibayar'],
            'total' => $request['total']
        ]);

    	return redirect('transaksi')->withSuccess('Berhasil Ditambah!');
    }
    public function delete(Request $request){
        $transaksi = Transaksi::FindOrFail($request->id);
        $transaksi->delete($request->all());
        return redirect('transaksi')->withSuccess('Berhasil Dihapus!');
    }
    public function edit(Request $request){
        $transaksi = Transaksi::FindOrFail($request->acuan);
        $data_outlet = Outlet::get();
        $data_pelanggan = Pelanggan::get();
        return view('transaksi_edit')->with('transaksi',$transaksi)->with('data_pelanggan',$data_pelanggan)->with('data_outlet',$data_outlet);
    }
    public function update(Request $request){
        $transaksi = Transaksi::findOrFail($request->id);
        $transaksi->update([
            'outlet_id' => $request['outlet_id'],
            'kode_invoice' => $request['kode_invoice'],
            'pelanggan_id' => $request['pelanggan_id'],
            'tanggal' => $request['tanggal'],
            'status' => $request['status'],
            'dibayar' => $request['dibayar'],
            'total' => $request['total'],
        ]); 
        return redirect('transaksi')->withSuccess('Berhasil Diupdate!');
    }
}
