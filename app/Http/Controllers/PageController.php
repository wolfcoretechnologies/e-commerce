<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Products;

class PageController extends Controller
{
    //
    public function main()
    {
        return view("main");
    }


    public function shop()
    {
        return view("shop");
    }

    public function productDetail($id)
    {
        $product = Products::findOrFail($id);
        return view('productdetail', compact('product'));
    }
}
