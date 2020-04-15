@extends('layouts.main_template')

@section('current-nav')
<li class="breadcrumb-item"><a href="{{url('pengeluaran')}}">Pengeluaran</a></li>
@endsection('current-nav')

@section('content')

<div class="container-fluid mt--6">
	<div class="row">
		<div class="col">
			<div class="card">
				<div class="card-header border-0">
					<h1 class="mb-4 text-center">Edit Data Pengeluaran</h1>
    
						<form action="{{url('pengeluaran/edit')}}" method="post">
						  {{csrf_field()}}
						  {{method_field('PUT')}}
						  <input type="hidden" name="id" value="{{$data_pengeluaran->id}}">
						    <div class="form-group mb-3">
						    	<label for="outlet_id">Nama Outlet</label>
                                    <select name="outlet_id" class="form-control" required>
										@foreach($data_outlet as $data)
										<option value="{{$data->id}}" @if($data->id == $data_pengeluaran->outlet_id) selected @endif>{{$data->nama}}</option>
										@endforeach
                                    </select>
                            </div>
						  	<div class="form-group">
						    	<label for="tanggal">Tanggal</label>
						    	<input type="date" class="form-control" id="tanggal" placeholder="tanggal" name="tanggal" value="{{$data_pengeluaran->tanggal}}" required>
						  	</div>
						  	<div class="form-group mb-3">
						    	<label for="outlet_id">Jenis Pengeluaran</label>
                                    <select name="outlet_id" class="form-control" required>
										@foreach($data_jenis_pengeluaran as $data)
										<option value="{{$data->id}}" @if($data->id == $data_pengeluaran->jenis_pengeluaran_id) selected @endif>{{$data->nama}}</option>
										@endforeach
                                    </select>
                            </div>
						  	<div class="form-group">
						    	<label for="total">Total</label>
						    	<input type="text" class="form-control" id="total" placeholder="Total" value="{{$data_pengeluaran->total}}" name="total" required>
						  	</div>
						  	<div class="form-group">
						    	<label for="keterangan">Keterangan</label>
						    	<input type="text" class="form-control" id="keterangan" placeholder="keterangan" value="{{$data_pengeluaran->keterangan}}" name="keterangan" required>
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