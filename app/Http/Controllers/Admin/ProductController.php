<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Products;
use App\Models\ProductImages;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{

    public function show()
    {
        $products = Products::orderBy("id", "desc")->paginate(10);
        return view("admin.products.products", compact("products"));
    }
    public function create()
    {
        return view('admin.products.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'small_description' => 'required|string',
            'price' => 'required|numeric',
            'discount_price' => 'nullable|numeric',
            'description' => 'nullable|string',
            'size_category' => 'nullable|string',
            'color_category' => 'nullable|string',
            'variation_category' => 'nullable|string',
            'stock' => 'required|integer',
            'image' => 'required|string',
            'uploaded_images' => 'nullable|string',
            'colors' => 'required|array',
        ]);

        // Optional: store a generic product (main listing) if you want
        $mainProduct = null;
        if (!empty($request->image)) {
            $mainProduct = Products::create([
                'name' => $request->name,
                'slug' => $request->slug ?? Str::slug($request->name),
                'small_description' => $request->small_description,
                'price' => $request->price,
                'discount_price' => $request->discount_price ?? 0,
                'description' => $request->description,
                'size_category' => $request->size_category,
                'color_category' => $request->color_category,
                'variation_category' => $request->variation_category,
                'stock' => $request->stock,
                'image' => $request->image
            ]);

            if ($request->uploaded_images) {
                foreach (json_decode($request->uploaded_images, true) as $img) {
                    ProductImages::create([
                        'product_id' => $mainProduct->id,
                        'image' => $img
                    ]);
                }
            }
        }

        // Now create individual color products
        $groupId = null;


        foreach ($request->colors as $index => $colorData) {
            $productData = [
                'name' => $request->name . ' - ' . $colorData['name'],
                'slug' => Str::slug($request->name . '-' . $colorData['name']),
                'small_description' => $request->small_description,
                'price' => $request->price,
                'discount_price' => $request->discount_price ?? 0,
                'description' => $request->description,
                'size_category' => $request->size_category,
                'color_category' => $colorData['name'],
                'variation_category' => $request->variation_category,
                'stock' => $request->stock,
                'image' => $colorData['image'],
                'parent_id' => $groupId, // first one will be NULL
            ];

            $colorProduct = Products::create($productData);

            if ($index == 0) {
                // first variant becomes the group leader
                $groupId = $mainProduct->id;

                // Update its parent_id
                $colorProduct->parent_id = $groupId;
                $colorProduct->save();
            }

            // Images
            foreach ($colorData['images'] ?? [] as $img) {
                ProductImages::create([
                    'product_id' => $colorProduct->id,
                    'image' => $img
                ]);
            }

            foreach (json_decode($colorData['gallery'] ?? '[]', true) as $img) {
                ProductImages::create([
                    'product_id' => $colorProduct->id,
                    'image' => $img
                ]);
            }

            // Sizes
            foreach ($colorData['sizes'] ?? [] as $sizeData) {
                if (isset($sizeData['size'], $sizeData['stock'])) {
                    $colorProduct->sizes()->create([
                        'size' => $sizeData['size'],
                        'stock' => $sizeData['stock'],
                    ]);
                }
            }
        }


        return redirect()->back()->with('success', 'Product added successfully!');
    }


}

