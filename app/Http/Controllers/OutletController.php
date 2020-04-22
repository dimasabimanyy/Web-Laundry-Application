<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Outlet;

class OutletController extends Controller
{
    public function index(Request $request){
    	$key = $request->q_nama;
    	$data_outlet = Outlet::OrderBy('nama');
    	if ($key != '') {
    		$data_outlet->where('nama','like','%' . $key . '%');
    	}
    	$data_outlet = $data_outlet->get();
    	return view('outlet_index')->with('data_outlet',$data_outlet);
    }
    public function create(){
    	return view('outlet_create');
    }
    public function insert(Request $request){
    	Outlet::Create($request->all());
    	return redirect('outlet')->withSuccess('Berhasil Ditambah!');
    }
    public function delete(Request $request){
        $outlet = Outlet::FindOrFail($request->id);
        $outlet->delete($request->all());
        return redirect('outlet')->withSuccess('Berhasil Dihapus!');
    }
    public function edit(Request $request){
        $data_outlet = Outlet::FindOrFail($request->acuan);
        return view('outlet_edit')->with('data_outlet',$data_outlet);
    }
    public function update(Request $request){
        $outlet = Outlet::findOrFail($request->id);
        // dd($outlet);
        $outlet->update($request->all());
        // $outlet_save->nama = $outlet->nama;
        // $outlet_save->alamat = $outlet->alamat;
        // $outlet_save->telepon = $outlet->telepon;
        // $outlet_save->save(); 
        // $outlet->update([
        //     'nama' => $name->nama,
        //     'alamat' => $alamat->alamat,
        //     'telepon' => $telepon->telepon
        // ])->where('id' == $request->id);  
        return redirect('outlet')->withSuccess('Berhasil Diupdate!');
    }
 
}
