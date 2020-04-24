<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pengeluaran extends Model
{
    protected $table = 'pengeluarans';
    protected $guarded = ['id'];

    public function Outlet(){
    	return $this->belongsTo(Outlet::Class);
    }
    public function JenisPengeluaran(){
    	return $this->belongsTo(JenisPengeluaran::Class);
    }
    public function transaksi(){
    	return $this->hasMany(Transaksi::Class);
    }
}
