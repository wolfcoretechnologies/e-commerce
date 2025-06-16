<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\ProductImages;
use App\Models\ProductColor;

class Products extends Model
{
    //
    protected $table = 'products';

    protected $fillable = ['name', 'product_id', 'image', 'slug', 'small_description', 'price', 'discount_price', 'description', 'size_category', 'color_category', 'variation_category', 'stock', 'parent_id'];
    public function images()
    {
        return $this->hasMany(ProductImages::class);
    }

    public function colors()
    {
        return $this->hasMany(ProductColor::class, 'product_id');
    }

    public function sizes()
    {
        return $this->hasMany(ProductSize::class, 'product_id');
    }

}
