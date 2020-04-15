@extends('layouts.main_template')

@section('current-nav')
<li class="breadcrumb-item"><a href="#">Master</a></li>
<li class="breadcrumb-item"><a href="{{url('outlet')}}">Outlet</a></li>
@endsection('current-nav')

@section('content')
<div class="container-fluid mt--6">
	<div class="row">
		<div class="col">
			<div class="card">
				<div class="card-header border-0">
					<h1 class="mb-4 text-center">Edit Data <span class="text-blue">{{$data_outlet->nama}}</span> Outlet</h1>
    
						<form action="{{url('outlet/edit')}}" method="post">
						  {{csrf_field()}}
						  {{method_field('PUT')}}
						  <input type="hidden" name="id" value="{{$data_outlet->id}}">
						    <div class="form-group">
						    	<label for="nama">Nama Outlet</label>
						    	<input type="text" class="form-control" id="nama" placeholder="Nama Outlet" value="{{$data_outlet->nama}}" name="nama" required>
						  	</div>
						  	<div class="form-group">
						    	<label for="alamat">Alamat</label>
						    	<input type="text" class="form-control" id="alamat" placeholder="Alamat" name="alamat" value="{{$data_outlet->alamat}}" required>
						  	</div>
						  	<div class="form-group">
						    	<label for="telepon">No Telepon</label>
						    	<input type="text" class="form-control" id="telepon" placeholder="No Telepon" value="{{$data_outlet->telepon}}" name="telepon" required>
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