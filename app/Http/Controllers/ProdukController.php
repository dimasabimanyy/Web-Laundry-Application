<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\{Produk, Outlet};

class ProdukController extends Controller
{
    public function index(Request $request){
    	$key = $request->q_nama;
    	$data_produk = Produk::OrderBy('nama');
    	if($key != '') {
    		$data_produk->where('nama','like','%' . $key . '%');
    	}
    	$data_produk = $data_produk->get();
    	$data_outlet = Outlet::get();
    	return view('produk_index')->with('data_produk',$data_produk)->with('data_outlet',$data_outlet);
    }
    public function create(){
    	$data_outlet = Outlet::get();
    	return view('produk_index')->with('data_outlet',$data_outlet);
    }
    public function insert(Request $request){
    	Produk::Create($request->all());
    	return redirect('produk')->withSuccess('Berhasil Ditambah!');
    }
    public function delete(Request $request){
        $produk = Produk::FindOrFail($request->id);
        $produk->delete($request->all());
        return redirect('produk')->withSuccess('Berhasil Dihapus!');
    }
    public function edit(Request $request){
        $data_produk = Produk::FindOrFail($request->acuan);
        $data_outlet = Outlet::get();
        return view('produk_edit')->with('data_produk',$data_produk)->with('data_outlet',$data_outlet);
    }
    public function update(Request $request){
        $produk = Produk::findOrFail($request->id);
        $produk->update($request->all()); 
        return redirect('produk')->withSuccess('Berhasil Diupdate!');
    }
}
