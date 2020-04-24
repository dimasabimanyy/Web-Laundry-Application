@extends('layouts.main_template')

@section('current-nav')
<li class="breadcrumb-item"><a href="{{url('transaksi')}}">Transaksi</a></li>
@endsection('current-nav')

@section('content')

<div class="container-fluid mt--6">
	<div class="row">
		<div class="col">
			<div class="card">
				<div class="card-header border-0">
					<h1 class="mb-4 text-center">Edit Data Transaksi</h1>
    
						<form action="{{url('transaksi/edit')}}" method="post">
						  {{csrf_field()}}
						  {{method_field('PUT')}}
						  <input type="hidden" name="id" value="{{$transaksi->id}}">
						    <div class="form-group mb-3">
						    	<label for="outlet_id">Outlet</label>
                                    <select name="outlet_id" class="form-control" required>
										@foreach($data_outlet as $data)
										<option value="{{$data->id}}" @if($data->id == $transaksi->outlet_id) selected @endif>{{$data->nama}}</option>
										@endforeach
                                    </select>
                            </div>
						  	<div class="form-group mb-3">
						    	<label for="outlet_id">Nama Pelanggan</label>
                                    <select name="pelanggan_id" class="form-control" required>
										@foreach($data_pelanggan as $data)
										<option value="{{$data->id}}" @if($data->id == $transaksi->pelanggan_id) selected @endif>{{$data->nama}}</option>
										@endforeach
                                    </select>
                            </div>
						  	<div class="form-group">
						    	<label for="kode_invoice">Kode Invoice</label>
						    	<input type="text" class="form-control" id="kode_invoice" placeholder="Kode Invoice" name="kode_invoice" value="{{$transaksi->kode_invoice}}" required>
						  	</div>
						  	<div class="form-group">
						    	<label for="telepon">Tanggal</label>
						    	<input type="date" class="form-control" id="tanggal" placeholder="Tanggal" value="{{$transaksi->tanggal}}" name="tanggal" required>
						  	</div>
						  	<div class="form-group mb-3">
						    	<label for="Status">Status</label>
                                    <select name="status" class="form-control" required>
                                    	<?php if ($transaksi->status == 'baru') { ?>
                                    		<option value="{{$transaksi->status}}">Baru</option>
                                    		<option value="proses">Proses</option>
                                    		<option value="selesai">Selesai</option>
                                    		<option value="diambil">Diambil</option>
                                    	<?php }elseif ($transaksi->status == 'proses') { ?>
                                    		<option value="{{$transaksi->status}}">Proses</option>
                                    		<option value="selesai">Selesai</option>
                                    		<option value="diambil">Diambil</option>
                                    		<option value="baru">Baru</option>
                                    	<?php }elseif ($transaksi->status == 'selesai') { ?>
                                    		<option value="{{$transaksi->status}}">Selesai</option> 
                                    		<option value="diambil">Diambil</option>
                                    		<option value="baru">Baru</option>
                                    		<option value="proses">Proses</option>
                                    	<?php }elseif($transaksi->status == 'diambil'){ ?>
											<option value="{{$transaksi->status}}">Diambil</option>
                                    		<option value="baru">Baru</option>
                                    		<option value="proses">Proses</option>
                                    		<option value="selesai">Selesai</option>
                                    	<?php }?>
                                    </select>
                            </div>
						  	<div class="form-group mb-3">
						    	<label for="dibayar">Dibayar</label>
                                    <select name="dibayar" class="form-control" required>
                                    	<?php if ($transaksi->dibayar == 'belum_dibayar') { ?>
                                    		<option value="{{$transaksi->dibayar}}">Belum Dibayar</option>
                                    		<option value="sudah_dibayar">Sudah Dibayar</option>
                                    	<?php }elseif ($transaksi->dibayar == 'sudah_dibayar') { ?>
                                    		<option value="{{$transaksi->dibayar}}">Sudah Dibayar</option>
                                    		<option value="belum_dibayar">Belum Dibayar</option>
                                    	<?php } ?>
                                    </select>
                            </div>
						  	<div class="form-group">
						    	<label for="total">Total</label>
						    	<input type="text" class="form-control" id="total" placeholder="total" value="{{$transaksi->total}}" name="total" required>
						  	</div>
						    
						    <div class="text-center">
						        <button  class="btn btn-primary my-4">Update Data</button>
						    </div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
		</div>
	</div>
</div>


@endsection('content')