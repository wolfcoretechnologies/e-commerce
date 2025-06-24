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
        $sizes = ProductSize::where("product_id", $mainProduct->id)->get(); // ✅ Fix here
        // dd($sizes);
        // Include the main product in the list
        $colorProducts->push($mainProduct);

        $sizePrices = collect($sizes)->mapWithKeys(function ($s) {
            return [
                $s->size => [
                    'price' => $s->price,
                    'discount_price' => $s->discount_price,
                    'source_price' => $s->source_price,
                ]
            ];
        });


        return view('productdetail', compact('mainProduct', 'viewedProduct', 'productImages', 'colorProducts', 'sizes', 'sizePrices'));

    }
}
