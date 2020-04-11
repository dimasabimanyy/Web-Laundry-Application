<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pelanggan extends Model
{
    protected $table = 'pelanggans';
    protected $guarded = ['id'];

    public function outlet(){
    	return $this->belongsTo(Outlet::Class);
    }
}
