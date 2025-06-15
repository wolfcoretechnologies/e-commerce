<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Products;
class ProductImages extends Model
{
    //
    protected $table = 'product_images'; 
    protected $fillable = ['product_id', 'image'];

    public function product()
    {
        return $this->belongsTo(Products::class);
    }
}
