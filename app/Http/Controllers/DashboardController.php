<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Alert;

class DashboardController extends Controller
{
    public function index(){
    	Alert::success('pesan yang ingin disampaikan', 'Judul Pesan');
    	return view('dashboard');
    }
}
