<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\{Pengeluaran, JenisPengeluaran, Outlet};

class PengeluaranController extends Controller
{
    public function index(Request $request){
    	$key = $request->q_keterangan;
    	$data_pengeluaran = Pengeluaran::OrderBy('outlet_id');
    	if($key != '') {
    		$data_pengeluaran->where('keterangan','like','%' . $key . '%');
    	}
    	$data_pengeluaran = $data_pengeluaran->paginate(20);
    	$data_outlet = Outlet::get();
    	$data_jenis_pengeluaran = JenisPengeluaran::get();
    	return view('pengeluaran_index')->with('data_pengeluaran',$data_pengeluaran)->with('data_outlet',$data_outlet)->with('data_jenis_pengeluaran',$data_jenis_pengeluaran);
    }
    public function create(){
    	$data_outlet = Outlet::get();
    	$data_jenis_pengeluaran = JenisPengeluaran::get();
    	return view('pengeluaran_index')->with('data_outlet',$data_outlet)->with('data_jenis_pengeluaran',$data_jenis_pengeluaran);
    }
    public function insert(Request $request){
    	Pengeluaran::Create($request->all());
    	return redirect('pengeluaran')->withSuccess('Berhasil Ditambah!');
    }
    public function delete(Request $request){
        $pengeluaran = Pengeluaran::FindOrFail($request->id);
        $pengeluaran->delete($request->all());
        return redirect('pengeluaran')->withSuccess('Berhasil Dihapus!');
    }
    public function edit(Request $request){
        $data_pengeluaran = Pengeluaran::FindOrFail($request->acuan);
        $data_outlet = Outlet::get();
        $data_jenis_pengeluaran = JenisPengeluaran::get();
        return view('pengeluaran_edit')->with('data_pengeluaran',$data_pengeluaran)->with('data_outlet',$data_outlet)->with('data_jenis_pengeluaran',$data_jenis_pengeluaran);
    }
    public function update(Request $request){
        $pengeluaran = Pengeluaran::findOrFail($request->id);
        $pengeluaran->update($request->all()); 
        return redirect('pengeluaran')->withSuccess('Berhasil Diupdate!');
    }
}
