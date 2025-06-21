<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Products;
use App\Models\ProductSize;
use App\Models\ProductImages;

class PageController extends Controller
{
    //
    public function main()
    {
        $data = Products::all();

        return view("main", compact('data'));
    }


    public function shop()
    {
        $products = Products::all();
        return view("shop", compact("products"));
    }
    public function productDetail($id)
    {
        $viewedProduct = Products::findOrFail($id);

        // Get main product
        $mainProduct = $viewedProduct->parent_id
            ? Products::findOrFail($viewedProduct->parent_id)
            : $viewedProduct;

        // Get product images of the current viewed product (main or variant)
        $productImages = ProductImages::where("product_id", $viewedProduct->id)->get();

        // Get all color products including the main product
        $colorProducts = Products::where("parent_id", $mainProduct->id)->get();

         $sizes = ProductSize::where("product_id", $mainProduct->id)->get();

        // Include the main product in the list
        $colorProducts->push($mainProduct);

        // // Get sizes
        // $sizes = Products::where('parent_id', $mainProduct->id)
        //     ->whereNotNull('size_category')
        //     ->select('size_category')
        //     ->groupBy('size_category')
        //     ->pluck('size_category');

        // Send both viewed and main product
        return view('productdetail', compact('mainProduct', 'viewedProduct', 'productImages', 'colorProducts', 'sizes'));

    }
}
