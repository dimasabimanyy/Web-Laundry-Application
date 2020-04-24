@extends('layouts.main_template')

@section('current-nav')
<li class="breadcrumb-item"><a href="{{url('laporan')}}">Laporan</a></li>
@endsection('current-nav')

@section('optional-css')
<link rel="stylesheet" href="{{asset('css/style.css')}}">
@endsection('optional-css')

@section('content')
<div class="container-fluid mt--6">
<div class="row">
    <div class="col">
      <div class="card">
        <!-- Card header -->
        <div class="card-header border-0">
          <h1 class="mb-0 text-center">Laporan</h1>
        </div>
        <!-- Light table -->
        <div class="table-responsive">
          <table class="table align-items-center table-flush">
            <thead class="thead-light">
              <tr>
                <th scope="col" class="sort">No</th>
                <th scope="col" class="sort">Tanggal</th>
                <th scope="col" class="sort">Transaksi</th>
                <th scope="col" class="sort">Pengeluaran</th>
                <th scope="col" class="sort">Total</th>
                <th scope="col" class="sort">Aksi</th>
              </tr>
            </thead>
            <tbody class="list">
              @foreach($data_pengeluaran as $data)
              <tr>
                <td>
                    {{$loop->iteration}}
                </td>
                <th scope="row">
                  <div class="media align-items-center">
                    <div class="media-body">
                      <span class="name mb-0 text-sm">
                        {{$data->tanggal}}
                      </span>
                    </div>
                  </div>
                </th>
                <td>
                </td>
                <td>
                    {{number_format($data->total)}}
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
              <li class="page-item">
                <!-- {{$data_pengeluaran->links()}} -->
              </li>
            </ul>
          </nav>
        </div>
      </div>
    </div>
  </div>
</div>

@endsection('content')
