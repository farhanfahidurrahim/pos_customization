<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Combo extends Model
{
    public function product()
    {
        return $this->hasMany(Product::class, 'product_id');
    }
}
