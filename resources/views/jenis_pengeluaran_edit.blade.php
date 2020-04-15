@extends('layouts.main_template')

@section('optional-css')
<link rel="stylesheet" href="{{asset('css/style.css')}}">
@endsection('optional-css')

@section('current-nav')
<li class="breadcrumb-item"><a href="#">Master</a></li>
<li class="breadcrumb-item"><a href="{{url('jenis-pengeluaran')}}">Jenis Pengeluaran</a></li>
@endsection('current-nav')

@section('content')
<div class="container-fluid mt--6">
	<div class="row">
		<div class="col">
			<div class="card">
				<div class="card-header border-0">
					<h1 class="mb-4 text-center">Edit Data Jenis Pengeluaran</h1>
    
						<form action="{{url('jenis-pengeluaran/edit')}}" method="post">
						  {{csrf_field()}}
						  {{method_field('PUT')}}
						  <input type="hidden" name="id" value="{{$data_jenis_pengeluaran->id}}">
						    
						  	<div class="form-group">
						    	<label for="nama">Nama Jenis Pengeluaran</label>
						    	<input type="text" class="form-control" id="nama-pengeluaran" placeholder="Nama Pengeluaran" name="nama" value="{{$data_jenis_pengeluaran->nama}}" required>
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