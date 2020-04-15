@extends('layouts.main_template')

@section('current-nav')
<li class="breadcrumb-item"><a href="#">Master</a></li>
<li class="breadcrumb-item"><a href="{{url('produk')}}">Pelanggan</a></li>
@endsection('current-nav')

@section('content')

<div class="container-fluid mt--6">
	<div class="row">
		<div class="col">
			<div class="card">
				<div class="card-header border-0">
					<h1 class="mb-4 text-center">Edit Data Produk</h1>
    
						<form action="{{url('produk/edit')}}" method="post">
						  {{csrf_field()}}
						  {{method_field('PUT')}}
						  <input type="hidden" name="id" value="{{$data_produk->id}}">
						    <div class="form-group mb-3">
						    	<label for="outlet_id">Nama Outlet</label>
                                    <select name="outlet_id" class="form-control" required>
										@foreach($data_outlet as $data)
										<option value="{{$data->id}}" @if($data->id == $data_produk->outlet_id) selected @endif>{{$data->nama}}</option>
										@endforeach
                                    </select>
                            </div>
						  	<div class="form-group mb-3">
						  		<label for="jenis">Jenis</label>
						    	<select name="jenis" class="form-control">
									<?php if ($data_produk->jenis == 'kiloan') { ?>
										<option value="kiloan">Kiloan</option>
										<option value="selimut">Selimut</option>
										<option value="bed_cover">Bed Cover</option>
										<option value="kaos">Kaos</option>
										<option value="lain">Lain</option>
									<?php } ?>
									<?php if ($data_produk->jenis == 'selimut') { ?>
										<option value="selimut">Selimut</option>
										<option value="kiloan">Kiloan</option>
										<option value="bed_cover">Bed Cover</option>
										<option value="kaos">Kaos</option>
										<option value="lain">Lain</option>
									<?php } ?>
									<?php if ($data_produk->jenis == 'bed_cover') { ?>
										<option value="bed_cover">Bed Cover</option>
										<option value="kiloan">Kiloan</option>
										<option value="selimut">Selimut</option>
										<option value="kaos">Kaos</option>
										<option value="lain">Lain</option>
									<?php } ?>
									<?php if ($data_produk->jenis == 'kaos') { ?>
										<option value="kaos">Kaos</option>
										<option value="kiloan">Kiloan</option>
										<option value="selimut">Selimut</option>
										<option value="bed_cover">Bed Cover</option>
										<option value="lain">Lain</option>
									<?php } ?>
									<?php if ($data_produk->jenis == 'lain') { ?>
										<option value="lain">Lain</option>
										<option value="kiloan">Kiloan</option>
										<option value="selimut">Selimut</option>
										<option value="bed_cover">Bed Cover</option>
										<option value="kaos">Kaos</option>
									<?php } ?>
							</select>
						  	</div>
						  	<div class="form-group">
						    	<label for="nama">Nama Produk</label>
						    	<input type="text" class="form-control" id="nama" placeholder="Nama Produk" name="nama" value="{{$data_produk->nama}}" required>
						  	</div>
						  	<div class="form-group">
						    	<label for="telepon">Harga</label>
						    	<input type="text" class="form-control" id="harga" placeholder="Harga" value="{{$data_produk->harga}}" name="harga" required>
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