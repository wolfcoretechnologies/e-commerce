<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProductSize extends Model
{
    //

    protected $table = "product_sizes";
    protected $fillable = [
        'product_id',
        'size',
        'stock',
        'price',
        'discount_price',
        'source_price',
    ];
}
