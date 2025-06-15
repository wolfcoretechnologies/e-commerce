<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProductColor extends Model
{
    //

    protected $table = "product_colors";
    protected $fillable = ['product_id','color_name', 'color_image'];
    public function sizes()
    {
        return $this->hasMany(ProductSize::class);
    }
}
