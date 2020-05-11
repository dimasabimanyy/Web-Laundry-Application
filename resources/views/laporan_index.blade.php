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
              </tr>
            </thead>
            <tbody class="list">
              @foreach($data as $laporan)
              <tr>
                <td>
                    {{$loop->iteration}}
                </td>
                <th scope="row">
                  <div class="media align-items-center">
                    <div class="media-body">
                      <span class="name mb-0 text-sm">
                        {{$laporan->tanggal}}
                      </span>
                    </div>
                  </div>
                </th>
                  <td>
                    {{number_format($laporan->total)}}
                  </td>
                  <td>
                    {{number_format($laporan->total)}}
                  </td>
                  <td>
                        <!-- Total -->
                  </td>
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
              </li>
            </ul>
          </nav>
        </div>
      </div>
    </div>
  </div>
</div>

@endsection('content')
