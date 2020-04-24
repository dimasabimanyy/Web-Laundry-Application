<?php

use Illuminate\Support\Facades\Route;

Auth::routes();
// Route::middleware('auth')->group(function(){

//----- ACCESS FOR ADMIN ONLY -----
Route::group(['middleware' => ['auth','CheckRole:admin']],function(){

	Route::get('/outlet','OutletController@index');	//for show data
	Route::get('/outlet/create','OutletController@create');//for show create form table
	Route::post('/outlet/create','OutletController@insert');//for process from form create
	Route::delete('/outlet/delete','OutletController@delete');//for delete data
	Route::get('/outlet/edit/{acuan}','OutletController@edit');//for show edit form
	Route::put('/outlet/edit','OutletController@update');//for process behind edit form

	//------Produk / Paket ---------
	Route::get('/produk','ProdukController@index');
	Route::get('/produk/create','ProdukController@create');
	Route::post('/produk/create','ProdukController@insert');
	Route::delete('/produk/delete','ProdukController@delete');
	Route::get('/produk/edit/{acuan}','ProdukController@edit');
	Route::put('/produk/edit','ProdukController@update'); 

	//------ Jenis Pengeluaran -----------
	Route::get('/jenis-pengeluaran','JenisPengeluaranController@index');	
	Route::get('/jenis-pengeluaran/create','JenisPengeluaranController@create');
	Route::post('/jenis-pengeluaran/create','JenisPengeluaranController@insert');
	Route::delete('/jenis-pengeluaran/delete','JenisPengeluaranController@delete');
	Route::get('/jenis-pengeluaran/edit/{acuan}','JenisPengeluaranController@edit'); 
	Route::put('/jenis-pengeluaran/edit','JenisPengeluaranController@update');   

	//------ Pengeluaran -----------
	Route::get('/pengeluaran','PengeluaranController@index');	
	Route::get('/pengeluaran/create','PengeluaranController@create');
	Route::post('/pengeluaran/create','PengeluaranController@insert');
	Route::delete('/pengeluaran/delete','PengeluaranController@delete');
	Route::get('/pengeluaran/edit/{acuan}','PengeluaranController@edit'); 
	Route::put('/pengeluaran/edit','PengeluaranController@update');   

	//------ Pengaturan -----------
	Route::get('/pengaturan','PengaturanController@index');	
	Route::get('/pengaturan/create','PengaturanController@create');
	Route::post('/pengaturan/create','PengaturanController@insert');
	Route::delete('/pengaturan/delete','PengaturanController@delete');
	Route::get('/pengaturan/edit/{acuan}','PengaturanController@edit'); 
	Route::put('/pengaturan/edit','PengaturanController@update'); 

	//------ Transaksi -----------
	Route::get('/transaksi','TransaksiController@index');	
	Route::get('/transaksi/create','TransaksiController@create');
	Route::post('/transaksi/create','TransaksiController@insert');
	Route::delete('/transaksi/delete','TransaksiController@delete');
	Route::get('/transaksi/edit/{acuan}','TransaksiController@edit'); 
	Route::put('/transaksi/edit','TransaksiController@update');  
  
});

// ------- ACCESS FOR ADMIN AND CASHIER ---------
Route::group(['middleware' => ['auth','CheckRole:admin,cashier']],function(){


	//------ Transaksi -----------
	Route::get('/transaksi','TransaksiController@index');	
	Route::get('/transaksi/create','TransaksiController@create');
	Route::post('/transaksi/create','TransaksiController@insert');
	Route::delete('/transaksi/delete','TransaksiController@delete');
	Route::get('/transaksi/edit/{acuan}','TransaksiController@edit'); 
	Route::put('/transaksi/edit','TransaksiController@update'); 

	//------ Pelanggan -----------
	Route::get('/pelanggan','PelangganController@index');	
	Route::get('/pelanggan/create','PelangganController@create');
	Route::post('/pelanggan/create','PelangganController@insert');
	Route::delete('/pelanggan/delete','PelangganController@delete');
	Route::get('/pelanggan/edit/{acuan}','PelangganController@edit'); 
	Route::put('/pelanggan/edit','PelangganController@update'); 

	//------ Detail Transaksi -----------
	Route::get('/detail-transaksi','DetailTransaksiController@index');	
	Route::get('/detail-transaksi/create','DetailTransaksiController@create');
	Route::post('/detail-transaksi/create','DetailTransaksiController@insert');
	Route::delete('/detail-transaksi/delete','DetailTransaksiController@delete');
	Route::get('/detail-transaksi/edit/{acuan}','DetailTransaksiController@edit'); 
	Route::put('/detail-transaksi/edit','DetailTransaksiController@update'); 

});

// ------- ACCESS FOR ADMIN, CASHIER AND OWNER --------
Route::group(['middleware' => ['auth','CheckRole:admin,cashier,owner']],function(){


	Route::get('/','DashboardController@index');

	//------ Laporan -----------
	Route::get('/laporan','LaporanController@index');	
	Route::get('/laporan/create','LaporanController@create');
	Route::post('/laporan/create','LaporanController@insert');
	Route::delete('/laporan/delete','LaporanController@delete');
	Route::get('/laporan/edit/{acuan}','LaporanController@edit'); 
	Route::put('/laporan/edit','LaporanController@update');

	//------ User Profile ------
	Route::get('/profile','UserController@edit');
	Route::put('/profile','UserController@user_update');


});

		