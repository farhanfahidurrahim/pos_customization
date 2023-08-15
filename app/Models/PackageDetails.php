<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PackageDetails extends Model
{
	protected $guarded = ['id'];
	
    public function product(){

    	return $this->belongsTo('App\Product','raw_product_id','id');
    }
}
