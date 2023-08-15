<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Package extends Model
{
	 protected $guarded = ['id'];
    public function raws(){

    	return $this->hasMany('App\PackageDetails','package_id','id');
    }

    public function product(){

    	return $this->belongsTo('App\Product','product_id','id');
    }
}
