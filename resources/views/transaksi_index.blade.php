@extends('layouts.main_template')

@section('search-form')
<!-- There is no search form, transaksi use filter form b date or by outlet -->
@endsection('search-form')

@section('current-nav')
<li class="breadcrumb-item"><a href="{{url('transaksi')}}">Transaksi</a></li>
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
                            <big>Tambah Data Transaksi</big>
                        </div>
                        <form action="{{url('transaksi/create')}}" method="post">
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
                                  <select name="status" class="form-control" required>
                                    <option>-- Pilih Status --</option>
                                    <option value="baru">Baru</option>
                                    <option value="proses">Proses</option>
                                    <option value="selesai">Selesai</option>
                                    <option value="diambil">Diambil</option>
                                  </select>  
                            </div>
                            <div class="form-group mb-3">
                                    <input class="form-control" placeholder="Kode Invoice" name="kode_invoice" required>
                            </div>
                            <div class="form-group mb-3">
                                    <select name="pelanggan_id" class="form-control" required>
                                      <option>- Pilih Pelanggan -</option>
                                      @foreach($data_pelanggan as $data)
                                      <option value="{{$data->id}}">{{$data->nama}}</option>
                                      @endforeach
                                    </select>
                            </div>
                            <div class="form-group mb-3">
                                    <input class="form-control" type="date" placeholder="Tanggal" name="tanggal" required>
                            </div>
                            <div class="form-group mb-3">
                                    <select name="dibayar" class="form-control" required>
                                      <option>- Pilih Status Bayar -</option>
                                      <option value="sudah_dibayar">Sudah Dibayar</option>
                                      <option value="belum_dibayar">Belum Dibayar</option>
                                    </select>
                            </div>
                            <div class="form-group mb-3">
                                    <input class="form-control" placeholder="Total" name="total" id="rupiah" required>
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
          <h1 class="mb-0 text-center">Transaksi</h1>
        </div>
        <!-- Light table -->
        <div class="table-responsive">
          <table class="table align-items-center table-flush">
            <thead class="thead-light">
              <tr>
                <th scope="col" class="sort">No</th>
                <th scope="col" class="sort">Pelanggan</th>
                <th scope="col" class="sort">Outlet</th>
                <th scope="col" class="sort">Status</th>
                <th scope="col" class="sort">Kode Invoice</th>
                <th scope="col" class="sort">Tanggal</th>
                <th scope="col" class="sort">Dibayar</th>
                <th scope="col" class="sort">Total</th>
                <th scope="col" class="sort">Aksi</th>
              </tr>
            </thead>
            <tbody class="list">
              @foreach($data_transaksi as $data)
              <tr>
                <td>
                    {{$loop->iteration}}
                </td>
                <th scope="row">
                  <div class="media align-items-center">
                    <div class="media-body">
                      <span class="name mb-0 text-sm">
                        {{$data->pelanggan->nama}}
                      </span>
                    </div>
                  </div>
                </th>
                <td>
                  {{$data->outlet->nama}}
                  <td class="text-center">
                    <?php if ($data->status == 'baru') { ?>
                      <button class="btn btn-info btn-sm">Baru</button>
                    <?php }elseif ($data->status == 'proses') { ?>
                      <button class="btn btn-warning btn-sm">Proses</button>
                    <?php }elseif ($data->status == 'selesai') { ?>                      
                      <button class="btn btn-warning btn-sm">Selesai</button>
                    <?php }else { ?>
                      <button class="btn btn-primary btn-sm">Diambil</button>
                    <?php } ?>
                  </td>
                </td>
                <td>
                    {{$data->kode_invoice}}
                </td>
                  <td>
                    {{$data->tanggal}}
                  </td>
                  <td class="text-center">
                    <?php if ($data->dibayar == 'sudah_dibayar') { ?>
                      <button class="btn btn-success btn-sm">Dibayar</button>
                    <?php }elseif ($data->dibayar == 'belum_dibayar') { ?>
                      <button class="btn btn-danger btn-sm">Belum Dibayar</button>
                    <?php } ?>
                  </td>
                  <td>
                    Rp {{number_format($data->total)}}
                  </td>
                  <td>

                    <!-- Edit -->
                      <form action="{{url('transaksi/delete')}}" method="post">
                      {{csrf_field()}}
                      {{method_field('DELETE')}}
                      <a href="{{url('/transaksi/edit',$data->id)}}" class="btn btn-icon btn-success btn-sm">
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
                {{$data_transaksi->links()}}
              </li>
            </ul>
          </nav>
        </div>
      </div>
    </div>
  </div>
</div>

@endsection('content')