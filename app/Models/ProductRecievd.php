<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProductRecievd extends Model {
    
    protected $guarded=[];
    
    public function line()
    {
        return $this->belongsTo(PurchaseLine::class,'purchase_line_id');
    }
    
    
}
