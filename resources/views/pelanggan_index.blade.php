@extends('layouts.main_template')

@section('search-form')
<form class="navbar-search navbar-search-light form-inline mr-sm-3" action="{{url('/pelanggan')}}" method="get" id="navbar-search-main">
  <div class="form-group mb-0">
    <div class="input-group input-group-alternative input-group-merge">
      <div class="input-group-prepend">
        <span class="input-group-text"><i class="fas fa-search"></i></span>
      </div>
      <input class="form-control" placeholder="Cari pelanggan" name="q_nama" type="text">
    </div>
  </div>
  <button type="button" class="close" data-action="search-close" data-target="#navbar-search-main" aria-label="Close">
    <span aria-hidden="true">×</span>
  </button>
</form>
@endsection('search-form')

@section('current-nav')
<li class="breadcrumb-item"><a href="#">Master</a></li>
<li class="breadcrumb-item"><a href="{{url('pelanggan')}}">Pelanggan</a></li>
@endsection('current-nav')

@section('optional-css')
<link rel="stylesheet" href="{{asset('css/style.css')}}">
@endsection('optional-css')

@section('form-tambah-data')
<a href="#" class="btn btn-neutral" data-toggle="modal" data-target="#modal-form-tambah-pelanggan">Tambah Data</a>

<!-- Modal untuk tambah data -->
<div class="modal fade" id="modal-form-tambah-pelanggan" tabindex="-1" role="dialog" aria-labelledby="modal-form" aria-hidden="true">
    <div class="modal-dialog modal- modal-dialog-centered modal-sm" role="document">
        <div class="modal-content">
            <div class="modal-body p-0">
                <div class="card bg-secondary border-0 mb-0">
                    <div class="card-body px-lg-5 py-lg-5">
                        <div class="text-center mb-4">
                            <big>Tambah Data Pelanggan</big>
                        </div>
                        <form action="{{url('pelanggan/create')}}" method="post">
                          {{csrf_field()}}
                          {{method_field('POST')}}
                            <div class="form-group mb-3">
                                    <select name="outlet_id" class="form-control" required>
                                      <option value="">- Pilih Outlet -</option>
                                      @foreach($data_outlet as $data)
                                      <option value="{{$data->id}}">{{$data->nama}}</option>
                                      @endforeach
                                    </select>
                            </div>
                            <div class="form-group mb-3">
                                    <input class="form-control" placeholder="Nama Pelanggan" name="nama">
                            </div>
                            <div class="form-group mb-3">
                                    <input class="form-control" placeholder="Alamat" name="alamat">
                            </div>
                            <div class="form-group mb-3">
                                    <input class="form-control" placeholder="Telepon" name="telepon">
                            </div>
                            <div class="text-center">
                                <button  class="btn btn-primary my-4">Tambah</button>
                            </div>
                        </form>
                    </div>
                </div>
             </div>
        </div>
    </div>
</div>
          <!-- End modal tambah data -->
@endsection('form-tambah-data')

@section('content')
<div class="container-fluid mt--6">
<div class="row">
    <div class="col">
      <div class="card">
        <!-- Card header -->
        <div class="card-header border-0">
          <h1 class="mb-0 text-center">Pelanggan</h1>
        </div>
        <!-- Light table -->
        <div class="table-responsive">
          <table class="table align-items-center table-flush">
            <thead class="thead-light">
              <tr>
                <th scope="col" class="sort">No</th>
                <th scope="col" class="sort" data-sort="nama">Nama Pelanggan</th>
                <th scope="col" class="sort" data-sort="outlet">Outlet</th>
                <th scope="col" class="sort" data-sort="alamat">Alamat</th>
                <th scope="col" class="sort" data-sort="telepon">Telepon</th>
                <th scope="col" class="sort">Aksi</th>
              </tr>
            </thead>
            <tbody class="list">
              @foreach($data_pelanggan as $data)
              <tr>
                <td>
                    {{$loop->iteration}}
                </td>
                <th scope="row">
                  <div class="media align-items-center">
                    <div class="media-body">
                      <span class="name mb-0 text-sm">
                        {{$data->nama}}
                      </span>
                    </div>
                  </div>
                </th>
                <td>
                    {{$data->outlet->nama}}
                </td>
                <td>
                    {{$data->alamat}}
                </td>
                  <td>
                    {{$data->telepon}}
                  </td>
                  <td>

                    <!-- Edit -->
                      <form action="{{url('pelanggan/delete')}}" method="post">
                      {{csrf_field()}}
                      {{method_field('DELETE')}}
                      <a href="{{url('/pelanggan/edit',$data->id)}}" class="btn btn-icon btn-success btn-sm">
                      <span class="btn-inner--icon">
                        <i class="fa fa-pencil-alt"></i>
                      </span>
                      <span class="btn-inner--text">Edit</span>
                      </a>
                      
                    <!-- Delete / Hapus -->
                      <input type="hidden" name="id" value="{{$data->id}}">
                      <button class="btn btn-icon btn-danger btn-sm">
                        <span class="btn-inner--icon">
                          <i class="fa fa-trash"></i>
                        </span>
                          <span class="btn-inner--text">Hapus</span>
                      </button>
                    </form>
                  </td>
                    <!-- End Delete -->
                </tr>
              @endforeach
            </tbody>
          </table>
        </div>
        <!-- Card footer -->
        <div class="card-footer py-4">
          <nav aria-label="...">
            <ul class="pagination justify-content-end mb-0">
              <li class="page-item disabled">
                <a class="page-link" href="#" tabindex="-1">
                  <i class="fas fa-angle-left"></i>
                  <span class="sr-only">Previous</span>
                </a>
              </li>
              <li class="page-item active">
                <a class="page-link" href="#">1</a>
              </li>
              <li class="page-item">
                <a class="page-link" href="#">2 <span class="sr-only">(current)</span></a>
              </li>
              <li class="page-item"><a class="page-link" href="#">3</a></li>
              <li class="page-item">
                <a class="page-link" href="#">
                  <i class="fas fa-angle-right"></i>
                  <span class="sr-only">Next</span>
                </a>
              </li>
            </ul>
          </nav>
        </div>
      </div>
    </div>
  </div>
</div>

@endsection('content')