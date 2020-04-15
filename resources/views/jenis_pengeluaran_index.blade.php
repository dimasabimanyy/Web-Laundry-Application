@extends('layouts.main_template')

@section('search-form')
<form class="navbar-search navbar-search-light form-inline mr-sm-3" action="{{url('/jenis-pengeluaran')}}" method="get" id="navbar-search-main">
  <div class="form-group mb-0">
    <div class="input-group input-group-alternative input-group-merge">
      <div class="input-group-prepend">
        <span class="input-group-text"><i class="fas fa-search"></i></span>
      </div>
      <input class="form-control" placeholder="Cari Jenis Pengeluaran" name="q_nama" type="text">
    </div>
  </div>
  <button type="button" class="close" data-action="search-close" data-target="#navbar-search-main" aria-label="Close">
    <span aria-hidden="true">×</span>
  </button>
</form>
@endsection('search-form')

@section('current-nav')
<li class="breadcrumb-item"><a href="#">Master</a></li>
<li class="breadcrumb-item"><a href="{{url('jenis_pengeluaran')}}">Jenis Pengeluaran</a></li>
@endsection('current-nav')

@section('optional-css')
<link rel="stylesheet" href="{{asset('css/style.css')}}">
@endsection('optional-css')

@section('form-tambah-data')
<a href="#" class="btn btn-neutral" data-toggle="modal" data-target="#modal-form-tambah-jenis_pengeluaran">Tambah Data</a>

<!-- Modal untuk tambah data -->
<div class="modal fade" id="modal-form-tambah-jenis_pengeluaran" tabindex="-1" role="dialog" aria-labelledby="modal-form" aria-hidden="true">
    <div class="modal-dialog modal- modal-dialog-centered modal-sm" role="document">
        <div class="modal-content">
            <div class="modal-body p-0">
                <div class="card bg-secondary border-0 mb-0">
                    <div class="card-body px-lg-5 py-lg-5">
                        <div class="text-center mb-4">
                            <big>Tambah Data Jenis Pengeluaran</big>
                        </div>
                        <form action="{{url('jenis-pengeluaran/create')}}" method="post">
                          {{csrf_field()}}
                          {{method_field('POST')}}
                            <div class="form-group mb-3">
                                    <input class="form-control" placeholder="Nama Pengeluaran" name="nama">
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
          <h1 class="mb-0 text-center">Jenis Pengeluaran</h1>
        </div>
        <!-- Light table -->
        <div class="table-responsive">
          <table class="table align-items-center table-flush">
            <thead class="thead-light">
              <tr>
                <th scope="col" class="sort">No</th>
                <th scope="col" class="sort" data-sort="name">Nama</th>
                <th scope="col" class="sort">Aksi</th>
              </tr>
            </thead>
            <tbody class="list">
              @foreach($data_jenis_pengeluaran as $data)
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

                    <!-- Edit -->
                      <form action="{{url('jenis-pengeluaran/delete')}}" method="post">
                      {{csrf_field()}}
                      {{method_field('DELETE')}}
                      <a href="{{url('/jenis-pengeluaran/edit',$data->id)}}" class="btn btn-icon btn-success btn-sm">
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