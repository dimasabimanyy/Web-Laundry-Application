<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\JenisPengeluaran;


class JenisPengeluaranController extends Controller
{
     public function index(Request $request){
    	$key = $request->q_nama;
    	$jenis_pengeluaran = JenisPengeluaran::OrderBy('nama');
    	if($key != '') {
    		$jenis_pengeluaran->where('nama','like','%' . $key . '%');
    	}
    	$jenis_pengeluaran = $jenis_pengeluaran->paginate(20);
    	return view('jenis_pengeluaran_index')->with('data_jenis_pengeluaran',$jenis_pengeluaran);
    }
    public function create(){
    	return view('jenis_pengeluaran_index');
    }
    public function insert(Request $request){
    	JenisPengeluaran::Create($request->all());
    	return redirect('jenis-pengeluaran')->withSuccess('Berhasil Ditambah!');
    }
    public function delete(Request $request){
        $jenis_pengeluaran = JenisPengeluaran::FindOrFail($request->id);
        $jenis_pengeluaran->delete($request->all());
        return redirect('jenis-pengeluaran')->withSuccess('Berhasil Dihapus!');
    }
    public function edit(Request $request){
        $jenis_pengeluaran = JenisPengeluaran::FindOrFail($request->acuan);
        return view('jenis_pengeluaran_edit')->with('data_jenis_pengeluaran',$jenis_pengeluaran);
    }
    public function update(Request $request){
        $jenis_pengeluaran = JenisPengeluaran::findOrFail($request->id);
        $jenis_pengeluaran->update($request->all()); 
        return redirect('jenis-pengeluaran')->withSuccess('Berhasil Diupdate!');
    }
}
