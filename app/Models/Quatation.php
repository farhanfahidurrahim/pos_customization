<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Quatation extends Model
{
    protected $guarded=['id'];


    public function details(){

    	return $this->hasMany(QuatationDetails::class,'quotation_id');
    }


    public function terms(){

    	return $this->hasMany(QuatationTerm::class,'quotation_id');
    }
}
