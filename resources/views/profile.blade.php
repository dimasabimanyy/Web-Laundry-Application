<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="Start your development with a Dashboard for Bootstrap 4.">
  <meta name="author" content="Creative Tim">
  <title>DoLaundry Web Apps</title>
  <!-- Favicon -->
  <link rel="icon" href="{{asset('/img/brand/favicon-32x32.png')}}" type="image/png">
  <!-- Fonts -->
  @yield('optional-css')
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700">
  <!-- Icons -->
  <link rel="stylesheet" href="{{asset('/vendor/nucleo/css/nucleo.css')}}" type="text/css">
  <link rel="stylesheet" href="{{asset('/vendor/@fortawesome/fontawesome-free/css/all.min.css')}}" type="text/css">
  <!-- Page plugins -->
  <!-- Argon CSS -->
  <link rel="stylesheet" href="{{asset('css/argon.css?v=1.2.0')}}" type="text/css">
</head>

<body>
  <!-- Sidenav -->
  <nav class="sidenav navbar navbar-vertical  fixed-left  navbar-expand-xs navbar-light bg-white" id="sidenav-main">
    <div class="scrollbar-inner">
      <!-- Brand -->
      <div class="sidenav-header  align-items-center">
        <a class="navbar-brand" href="javascript:void(0)">
          <img src="{{asset('/img/brand/dolaundry-blue.png')}}" class="navbar-brand-img" alt="...">
        </a>
      </div>
      <div class="navbar-inner">
        <!-- Collapse -->
        <div class="collapse navbar-collapse" id="sidenav-collapse-main">
          <!-- Nav items -->
          <ul class="navbar-nav">
            <li class="nav-item">
              <a class="nav-link active" href="{{url('/')}}">
                <i class="ni ni-tv-2 text-primary"></i>
                <span class="nav-link-text">Dashboard</span>
              </a>
            </li>

           @if(auth()->user()->role == 'admin' or auth()->user()->role == 'cashier')
            <li class="nav-item">
              <a class="nav-link">
                <i class="ni ni-planet text-orange"></i>
                <span class="nav-link-text">Master</span>
              </a>
                <ul>
                  @if(auth()->user()->role == 'admin')
                  <li class="nav-item dropdown">
                    <a href="{{url('/outlet')}}" class="nav-link">
                      <i class="ni ni-shop text-blue"></i>
                      <span class="nav-link-text">Outlet</span>
                    </a>
                  </li>
                  @endif
                  @if(auth()->user()->role == 'admin' or 'cashier')
                  <li class="nav-item dropdown">
                    <a href="{{url('/pelanggan')}}" class="nav-link">
                      <i class="fa fa-user-friends text-green"></i>
                      <span class="nav-link-text">Pelanggan</span>
                    </a>
                  </li>
                  @endif
                  @if(auth()->user()->role == 'admin')
                  <li class="nav-item dropdown">
                    <a href="{{url('/jenis-pengeluaran')}}" class="nav-link">
                      <i class="fa fa-random text-red"></i>
                      <span class="nav-link-text">Jenis Pengeluaran</span>
                    </a>
                  </li>
                  @endif
                  @if(auth()->user()->role == 'admin')
                  <li class="nav-item dropdown">
                    <a href="{{url('/produk')}}" class="nav-link">
                      <i class="ni ni-bullet-list-67 text-orange"></i>
                      <span class="nav-link-text">Produk</span>
                    </a>
                  </li>
                  @endif
                </ul>
            </li>
            @endif

            @if(auth()->user()->role == 'admin' or auth()->user()->role == 'cashier')
            <li class="nav-item">
              <a class="nav-link" href="{{url('/transaksi')}}">
                <i class="fa fa-money-bill-wave text-primary"></i>
                <span class="nav-link-text">Transaksi</span>
              </a>
            </li>
            @endif
            @if(auth()->user()->role == 'admin')
            <li class="nav-item">
              <a class="nav-link" href="{{url('/pengeluaran')}}">
                <i class="fa fa-sign-out-alt text-yellow"></i>
                <span class="nav-link-text">Pengeluaran</span>
              </a>
            </li>
            @endif
            <!-- @if(auth()->user()->role == 'admin' or 'cashier' or 'owner')
            <li class="nav-item">
              <a class="nav-link" href="{{url('/laporan')}}">
                <i class="fa fa-folder text-orange"></i>
                <span class="nav-link-text">Laporan</span>
              </a>
            </li>
            @endif -->
            @if(auth()->user()->role == 'admin')
            <li class="nav-item">
              <a class="nav-link" href="{{url('/member')}}">
                <i class="ni ni-circle-08 text-green"></i>
                <span class="nav-link-text">Member</span>
              </a>
            </li>
            @endif
          </ul>
          
        </div>
      </div>
    </div>
  </nav>
  <!-- Main content -->
  <div class="main-content" id="panel">
    <!-- Topnav -->
    <nav class="navbar navbar-top navbar-expand navbar-dark bg-default border-bottom">
      <div class="container-fluid">
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <!-- Search form -->
          <!-- @yield('search-form') -->
          <!-- Navbar links -->
          <ul class="navbar-nav align-items-center  ml-md-auto ">
            <li class="nav-item d-xl-none">
              <!-- Sidenav toggler -->
              <div class="pr-3 sidenav-toggler sidenav-toggler-dark" data-action="sidenav-pin" data-target="#sidenav-main">
                <div class="sidenav-toggler-inner">
                  <i class="sidenav-toggler-line"></i>
                  <i class="sidenav-toggler-line"></i>
                  <i class="sidenav-toggler-line"></i>
                </div>
              </div>
            </li>
            <li class="nav-item d-sm-none">
              <a class="nav-link" href="#" data-action="search-show" data-target="#navbar-search-main">
                <i class="ni ni-zoom-split-in"></i>
              </a>
            </li>
            <li class="nav-item dropdown">
              <a class="nav-link" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="ni ni-bell-55"></i>
              </a>
              <div class="dropdown-menu dropdown-menu-xl  dropdown-menu-right  py-0 overflow-hidden">
                <!-- Dropdown header -->
                <div class="px-3 py-3">
                  <h6 class="text-sm text-muted m-0">You have <strong class="text-primary">{{count(auth()->user()->unreadNotifications)}}</strong> notifications.</h6>
                </div>
                <!-- List group -->
                <div class="list-group list-group-flush">
                @foreach(auth()->user()->unreadNotifications as $notification)
                <a href="#!" class="list-group-item list-group-item-action">
                    <div class="row align-items-center">
                      <div class="col ml--2">
                        <div class="d-flex justify-content-between align-items-center">
                          <div>
                            <h4 class="mb-0 text-sm">@include('layouts.partials.notification.'.Str::snake(class_basename($notification->type)))</h4>
                          </div>
                          <!-- <div class="text-right text-muted">
                            <small>2 hrs ago</small>
                            
                          </div> -->
                        </div>
                        <p class="text-sm mb-0">@include('layouts.partials.notification.'.Str::snake(class_basename($notification->type)))</p>
                      </div>
                    </div>
                  </a>
                  @endforeach
                </div>
              </div>
            </li>
          </ul>
          <ul class="navbar-nav align-items-center  ml-auto ml-md-0 ">
            <li class="nav-item dropdown">
              <a class="nav-link pr-0" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <div class="media align-items-center">
                  <span class="avatar avatar-sm rounded-circle">
                    <img alt="Image placeholder" src="uploads/avatars/{{Auth::user()->avatar}}">
                  </span>
                  <div class="media-body  ml-2  d-none d-lg-block">
                    <span class="mb-0 text-sm  font-weight-bold">{{ Auth::user()->name }}</span>
                  </div>
                </div>
              </a>
              <div class="dropdown-menu  dropdown-menu-right ">
                <div class="dropdown-header noti-title">
                  <h6 class="text-overflow m-0">Selamat datang {{ Auth::user()->name }}!</h6>
                </div>
                  <a href="{{url('/profile')}}" class="dropdown-item" >
                    <i class="ni ni-circle-08"></i>
                    <span>Profile</span>
                  </a>
                <div class="dropdown-divider"></div>
                  <a href="{{route('logout')}}" class="dropdown-item" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                    <i class="ni ni-user-run"></i>
                    <span>Logout</span>
                  </a>
                  <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    {{ csrf_field() }}
                  </form>
              </div>
          </li>
          </ul>
        </div>
      </div>
    </nav>

    <!-- Header -->
    <div class="header pb-6 d-flex align-items-center" style="min-height: 500px; background-image: {{asset('/img/theme/team-1.jpg')}} ; background-size: cover; background-position: center top;">
      <!-- Mask -->
      <span class="mask bg-gradient-default opacity-8"></span>
      <!-- Header container -->
      <div class="container-fluid d-flex align-items-center text-center justify-content-center">
        <div class="row d-flex" style="display: grid; align-content: center;align-items: center;">
          <div class="col-xl-8 order-xl-1" style="margin: auto;" >
            <a href="#">
              <img src="/uploads/avatars/{{$user->avatar}}" style="width: 150px; height: 150px; border-radius: 50%; border: none;">
            </a>
            <h1 class="display-2 text-white">{{ Auth::user()->name }}</h1>
            <p class="text-white mt-0 mb-5">
              @if(Auth::user()->deskripsi == '')
                Ini adalah halaman profilmu. Kamu bisa mengganti foto profil, mengganti nama maupun memasukkan beberapa data tambahan seperti alamat dan deskripsi yang menggambarkan dirimu.
              @else
                {{Auth::user()->deskripsi}} 
              @endif
            </p>
          </div>
        </div>
      </div>
    </div>

    <!-- Page content -->
    <div class="container-fluid mt--6">
      <div class="row">
        <div class="col-xl-8 order-xl-1" style="margin: auto;">
          <div class="card">
            <div class="card-header">
              <div class="heading-small text-center">
                User information
              </div>
            </div>
            <div class="card-body">
              <!-- EDIR PROFILE FORM -->
              <form enctype="multipart/form-data" action="/profile" method="post" class="mb-3">
                @csrf
                @method('put')
                <div class="pl-lg-4">
                  <div class="row">
                    <div class="col-lg-12">
                      <div class="form-group">
                        <label class="form-control-label" for="avatar">Ubah Foto Profil</label>
                        <input type="file" id="avatar" class="form-control" name="avatar">
                        <input type="hidden" name="_token" value="{{csrf_token()}}">
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-lg-12">
                      <div class="form-group">
                        <label class="form-control-label" for="nama">Nama Lengkap</label>
                        <input type="text" id="name" class="form-control @error('name') is-invalid @enderror" placeholder="Masukkan nama lengkap" name="name" value="{{$user->name}}">
                        @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-lg-12">
                      <div class="form-group">
                        <label class="form-control-label" for="email">Email address</label>
                        <input type="email" id="email" class="form-control @error('email') is-invalid @enderror" placeholder="Masukkan alamat email" name="email" required value="{{$user->email}}">
                          @error('name')
                              <span class="invalid-feedback" role="alert">
                                  <strong>{{ $message }}</strong>
                              </span>
                          @enderror
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-lg-12">
                      <div class="form-group">
                        <label class="form-control-label" for="alamat">Alamat</label>
                        <input type="text" id="alamat" class="form-control" name="alamat" value="{{$user->alamat}}">
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-lg-12">
                      <div class="form-group">
                        <label class="form-control-label" for="deskripsi">Deskripsi</label>
                        <input type="text" id="deskripsi" class="form-control" name="deskripsi" value="{{$user->deskripsi}}">
                      </div>
                    </div>
                  </div>

                  <div class="row">
                    <div class="col-lg-12 text-center">
                      <button class="btn bg-success text-white">Kirim</button>
                    </div>
                  </div>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>

      <!-- Footer -->
      <footer class="footer pt-0">
        <div class="row align-items-center justify-content-lg-between">
          <div class="col-lg">
            <div class="copyright text-center  text-lg-center  text-muted">
              &copy; 2020 <a href="https://www.github.com/dimasabimanyy" class="font-weight-bold ml-1" target="_blank">DoLaundry Apps</a>
            </div>
          </div>
        </div>
      </footer>
    </div>
  </div>
  <!-- Argon Scripts -->
  <!-- Core -->
  <script src="{{asset('/vendor/jquery/dist/jquery.min.js')}}"></script>
  <script src="{{asset('/vendor/bootstrap/dist/js/bootstrap.bundle.min.js')}}"></script>
  <script src="{{asset('/vendor/js-cookie/js.cookie.js')}}"></script>
  <script src="{{asset('/vendor/jquery.scrollbar/jquery.scrollbar.min.js')}}"></script>
  <script src="{{asset('/vendor/jquery-scroll-lock/dist/jquery-scrollLock.min.js')}}"></script>
  <!-- Optional JS -->
  <script src="{{asset('/vendor/chart.js/dist/Chart.min.js')}}"></script>
  <script src="{{asset('/vendor/chart.js/dist/Chart.extension.js')}}"></script>
  <!-- Argon JS -->
  <script src="{{asset('/js/argon.js?v=1.2.0')}}"></script>
</body>

</html>
