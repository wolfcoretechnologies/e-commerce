<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Products;
use App\Models\ProductImages;

class PageController extends Controller
{
    //
   public function main()
    {
        $data=Products::all();

        return view("main", compact('data'));
    }


    public function shop()
    {
        $products = Products::all();
        return view("shop", compact("products"));
    }
    public function productDetail($id)
    {
        $product = Products::findOrFail($id);
        $productImages = ProductImages::where("product_id", $product->id)->get();
        $colorProducts = Products::where("parent_id", $product->id)->get();
        return view('productdetail', compact('product', 'productImages', 'colorProducts'));
    }
}
