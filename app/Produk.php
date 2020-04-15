<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Produk extends Model
{
    protected $table = 'produks';
    protected $guarded = ['id'];

    public function outlet(){
    	return $this->belongsTo(Outlet::Class);
    }
}
