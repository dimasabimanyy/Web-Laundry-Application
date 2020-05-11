@extends('layouts.main_template')

@section('search-form')
<form class="navbar-search navbar-search-light form-inline mr-sm-3" action="{{url('/member')}}" method="get" id="navbar-search-main">
  <div class="form-group mb-0">
    <div class="input-group input-group-alternative input-group-merge">
      <div class="input-group-prepend">
        <span class="input-group-text"><i class="fas fa-search"></i></span>
      </div>
      <input class="form-control" placeholder="Cari Member" name="q_nama" type="text">
    </div>
  </div>
  <button type="button" class="close" data-action="search-close" data-target="#navbar-search-main" aria-label="Close">
    <span aria-hidden="true">×</span>
  </button>
</form>
@endsection('search-form')

@section('optional-css')
<link rel="stylesheet" href="{{asset('css/optional.css')}}" type="text/css">
@endsection('optional-css')

@section('current-nav')
<li class="breadcrumb-item"><a href="">Dashboard</a></li>
@endsection('current-nav')

@section('content')

<div class="container-fluid mt--6"> 
  <div class="row">
    @foreach($users as $user)
    <div class="col-xl-4 col-md-6">
      <div class="card">
        <img class="card-img-top" src="/uploads/avatars/{{$user->avatar}}"  alt="Card image avatar profile">
        <div class="card-body">
          <h2 class="card-title text-center">{{$user->name}}</h2>
          <p class="card-text">
            <b>Role :</b> {{$user->role}} <br>
            <b>Email :</b> {{$user->email}} <br>
            @if($user->alamat != '')
            <b>Alamat :</b> {{$user->alamat}} <br>
            @else
              <b>Alamat : </b> -
            @endif
          </p>
          <p class="card-text">{{$user->deskripsi}}</p>
          <!-- Delete user. feature only show and process for admin -->
          @if($user->role != 'admin')
          <form action="{{url('member/delete')}}" method="post">
            {{csrf_field()}}
            {{method_field('DELETE')}}
            <input type="hidden" name="id" value="{{$user->id}}">
            <button class="btn btn-icon btn-danger">
              <span class="btn-inner--icon">
                <i class="fa fa-trash"></i>
              </span>
                <span class="btn-inner--text">Hapus Pengguna</span>
            </button>
          </form>
          @endif
        </div>
      </div>
    </div>
    @endforeach
  </div>
</div>
@endsection('content')