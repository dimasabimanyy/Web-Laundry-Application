@extends('layouts.main_template')

@section('optional-css')
<link rel="stylesheet" href="{{asset('css/optional.css')}}" type="text/css">
@endsection('optional-css')

@section('current-nav')
<li class="breadcrumb-item"><a href="">Dashboard</a></li>
@endsection('current-nav')

@section('dashboard-statistics')
<div class="row">
            <div class="col-xl-3 col-md-6">
              <div class="card card-stats">
                <!-- Card body -->
                <div class="card-body">
                  <div class="row">
                    <div class="col">
                      <h5 class="card-title text-uppercase text-muted mb-0">Pendapatan</h5>
                      <span class="h2 font-weight-bold mb-0">Rp{{$pendapatan}}</span>
                    </div>
                    <div class="col-auto">
                      <div class="icon icon-shape bg-gradient-red text-white rounded-circle shadow">
                        <i class="ni ni-active-40"></i>
                      </div>
                    </div>
                  </div>

                  <p class="mt-3 mb-0 text-sm">
                    <span class="text-success mr-2">Rp {{$pendapatan_prev_month}}</span>
                    <span class="text-nowrap">Pendapatan Bulan Lalu</span>
                  </p>
                </div>
              </div>
            </div>
            <div class="col-xl-3 col-md-6">
              <div class="card card-stats">
                <!-- Card body -->
                <div class="card-body">
                  <div class="row">
                    <div class="col">
                      <h5 class="card-title text-uppercase text-muted mb-0">Pengeluaran</h5>
                      <span class="h2 font-weight-bold mb-0">Rp{{$pengeluaran}}</span>
                    </div>
                    <div class="col-auto">
                      <div class="icon icon-shape bg-gradient-orange text-white rounded-circle shadow">
                        <i class="ni ni-chart-pie-35"></i>
                      </div>
                    </div>
                  </div>
                  <p class="mt-3 mb-0 text-sm">
                    <span class="text-success mr-2">Rp {{$pengeluaran_prev_month}}</span>
                    <span class="text-nowrap">Pengeluaran Bulan Lalu</span>
                  </p>
                </div>
              </div>
            </div>
            <div class="col-xl-3 col-md-6">
              <div class="card card-stats">
                <!-- Card body -->
                <div class="card-body">
                  <div class="row">
                    <div class="col">
                      <h5 class="card-title text-uppercase text-muted mb-0">Total Transaksi</h5>
                      <span class="h2 font-weight-bold mb-0">{{count($jlh_transaksi)}}</span>
                    </div>
                    <div class="col-auto">
                      <div class="icon icon-shape bg-gradient-green text-white rounded-circle shadow">
                        <i class="ni ni-money-coins"></i>
                      </div>
                    </div>
                  </div>
                  <p class="mt-3 mb-0 text-sm">
                    <span class="text-success mr-2">{{count($transaksi_prev_month)}}</span>
                    <span class="text-nowrap">Transaksi Bulan Lalu</span>
                  </p>
                </div>
              </div>
            </div>
            <div class="col-xl-3 col-md-6">
              <div class="card card-stats">
                <!-- Card body -->
                <div class="card-body">
                  <div class="row">
                    <div class="col">
                      <h5 class="card-title text-uppercase text-muted mb-0">Jumlah Outlet</h5>
                      <span class="h2 font-weight-bold mb-0">{{count($jlh_outlet)}}</span>
                    </div>
                    <div class="col-auto">
                      <div class="icon icon-shape bg-gradient-info text-white rounded-circle shadow">
                        <i class="ni ni-chart-bar-32"></i>
                      </div>
                    </div>
                  </div>
                  <p class="mt-3 mb-0 text-sm">
                  </p>
                </div>
              </div>
            </div>
          </div>
@endsection('dashboard-statistics')

@section('content')

<div class="container-fluid mt--6"> 
	<div class="col">
	  <div class="card bg-default">
	    <div class="card-header bg-transparent">
	      <div class="row align-items-center">
	        <div class="col">
	          <h6 class="text-light text-uppercase ls-1 mb-1">Overview</h6>
	          <h5 class="h3 text-white mb-0">Pendapatan sepanjang tahun {{$year}}</h5>
	        </div>
	        <div class="col">
	          <ul class="nav nav-pills justify-content-end">
	            <li class="nav-item" data-toggle="chart">
	              <a href="" class="nav-link py-2 px-3">
	                <span class="d-none d-md-block">Month</span>
	                <span class="d-md-none">W</span>
	              </a>
	            </li>
	          </ul>
	        </div>
	      </div>
	    </div>
	    <div class="card-body">
	      <!-- Chart -->
	      <div class="chart">
	        <!-- Chart wrapper -->
	        <canvas id="chart-sales-dark" class="chart-canvas"></canvas>
	      </div>
	    </div>
	  </div>
	</div>
</div>
@endsection('content')

@section('chart-js')
<script>

'use strict';

//
// Sales chart
//
var jan = {{$pen_jan}}
var feb = {{$pen_feb}}
var mar = {{$pen_mar}}
var apr = {{$pen_apr}}
var mei = {{$pen_mei}}
var jun = {{$pen_jun}}
var jul = {{$pen_jul}}
var aug = {{$pen_aug}}
var sept = {{$pen_sept}}
var oct = {{$pen_oct}}
var nov = {{$pen_nov}}
var dec = {{$pen_dec}}

var SalesChart = (function() {

  // Variables

  var $chart = $('#chart-sales-dark');


  // Methods

  function init($chart) {

    var salesChart = new Chart($chart, {
      type: 'line',
      options: {
        scales: {
          yAxes: [{
            gridLines: {
              lineWidth: 1,
              color: Charts.colors.gray[900],
              zeroLineColor: Charts.colors.gray[900]
            },
            ticks: {
              callback: function(value) {
                if (!(value % 10)) {
                  return 'Rp ' + value + ' Ribu';
                }
              }
            }
          }]
        },
        tooltips: {
          callbacks: {
            label: function(item, data) {
              var label = data.datasets[item.datasetIndex].label || '';
              var yLabel = item.yLabel;
              var content = '';

              if (data.datasets.length > 1) {
                content += label;
              }

              content += "Rp " + yLabel ;
              return content;
            }
          }
        }
      },
      data: {
        labels: ['Jan', 'Feb', 'Mar', 'Apr', 'Mei', 'Jun', 'Jul', 'Aug','Sep','Oct','Nov','Dec'],
        datasets: [{
          label: 'Penjualan',
          data: [jan, feb, mar, apr, mei, jun, jul, aug, sept, oct , nov , dec]
        }]
      }
    });

    // Save to jQuery object

    $chart.data('chart', salesChart);

  };


  // Events

  if ($chart.length) {
    init($chart);
  }

})();

</script>
@endsection('chart-js')

