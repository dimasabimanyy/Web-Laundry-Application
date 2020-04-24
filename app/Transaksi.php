<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
    protected $table = 'transaksis';
    protected $guarded = ['id'];

    public function pelanggan(){
    	return $this->belongsTo(Pelanggan::CLass);
    }
    public function outlet(){
    	return $this->belongsTo(Outlet::Class);
    }
}
