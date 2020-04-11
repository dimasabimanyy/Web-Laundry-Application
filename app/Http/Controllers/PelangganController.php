<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\{Pelanggan,Outlet};

class PelangganController extends Controller
{

    public function index(Request $request){
    	$key = $request->q_nama;
    	$data_pelanggan = Pelanggan::OrderBy('nama');
    	if($key != '') {
    		$data_pelanggan->where('nama','like','%' . $key . '%');
    	}
    	$data_pelanggan = $data_pelanggan->get();
    	$data_outlet = Outlet::get();
    	return view('pelanggan_index')->with('data_pelanggan',$data_pelanggan)->with('data_outlet',$data_outlet);
    }
    public function create(){
    	$data_outlet = Outlet::get();
    	return view('pelanggan_index')->with('data_outlet',$data_outlet);
    }
    public function insert(Request $request){
    	Pelanggan::Create($request->all());
    	return redirect('pelanggan');
    }
    public function delete(Request $request){
        $pelanggan = Pelanggan::FindOrFail($request->id);
        $pelanggan->delete($request->all());
        return redirect('pelanggan');
    }
    public function edit(Request $request){
        $data_pelanggan = Pelanggan::FindOrFail($request->acuan);
        $data_outlet = Outlet::get();
        return view('pelanggan_edit')->with('data_pelanggan',$data_pelanggan)->with('data_outlet',$data_outlet);
    }
    public function update(Request $request){
        $pelanggan = Pelanggan::findOrFail($request->id);
        $pelanggan->update($request->all()); 
        return redirect('pelanggan');
    }
}
