<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Profiles extends Model
{
    protected $table = 'profiles';
    protected $guarded = ['id'];

    public function user(){
    	return $this->belongsTo(User::Class);
    }

}
