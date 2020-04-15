@extends('layouts.main_template')

@section('current-nav')
<li class="breadcrumb-item"><a href="#">Master</a></li>
<li class="breadcrumb-item"><a href="{{url('pelanggan')}}">Pelanggan</a></li>
@endsection('current-nav')

@section('content')

<div class="container-fluid mt--6">
	<div class="row">
		<div class="col">
			<div class="card">
				<div class="card-header border-0">
					<h1 class="mb-4 text-center">Edit Data Pelanggan</h1>
    
						<form action="{{url('pelanggan/edit')}}" method="post">
						  {{csrf_field()}}
						  {{method_field('PUT')}}
						  <input type="hidden" name="id" value="{{$data_pelanggan->id}}">
						    <div class="form-group mb-3">
						    	<label for="outlet_id">Nama Outlet</label>
                                    <select name="outlet_id" class="form-control" required>
										@foreach($data_outlet as $data)
										<option value="{{$data->id}}" @if($data->id == $data_pelanggan->outlet_id) selected @endif>{{$data->nama}}</option>
										@endforeach
                                    </select>
                            </div>
						  	<div class="form-group">
						    	<label for="alamat">Nama Pelanggan</label>
						    	<input type="text" class="form-control" id="alamat" placeholder="Alamat" name="alamat" value="{{$data_pelanggan->nama}}" required>
						  	</div>
						  	<div class="form-group">
						    	<label for="alamat">Alamat</label>
						    	<input type="text" class="form-control" id="alamat" placeholder="Alamat" name="alamat" value="{{$data_pelanggan->alamat}}" required>
						  	</div>
						  	<div class="form-group">
						    	<label for="telepon">No Telepon</label>
						    	<input type="text" class="form-control" id="telepon" placeholder="No Telepon" value="{{$data_pelanggan->telepon}}" name="telepon" required>
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