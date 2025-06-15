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
            'image' => 'required|string', // path from Dropzone (not file)
            'uploaded_images' => 'nullable|string' // JSON encoded array from Dropzone
        ]);

        $slug = $request->slug ?? Str::slug($request->name);

        // Save product
        $product = Products::create([
            'name' => $request->name,
            'slug' => $slug,
            'small_description' => $request->small_description,
            'price' => $request->price,
            'discount_price' => $request->discount_price ?? 0,
            'description' => $request->description,
            'size_category' => $request->size_category,
            'color_category' => $request->color_category,
            'variation_category' => $request->variation_category,
            'stock' => $request->stock,
            'image' => $request->image // This is the stored path from Dropzone
        ]);


        if ($request->uploaded_images) {
            $imagePaths = json_decode($request->uploaded_images, true);

            foreach ($imagePaths as $path) {
                ProductImages::create([
                    'product_id' => $product->id,
                    'image' => $path
                ]);
            }
        }

        $groupId = $product->id;

        foreach ($request->colors as $index => $colorData) {
            $colorProduct = Products::create([
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
                'parent_id' => $groupId
            ]);

            if ($index == 0) {
                $groupId = $colorProduct->id;
                $colorProduct->parent_id = null;
                $colorProduct->save();
            } else {
                $colorProduct->parent_id = $groupId;
                $colorProduct->save();
            }

            // Add additional images (optional)
            if (!empty($colorData['images'])) {
                foreach ($colorData['images'] as $imagePath) {
                    ProductImages::create([
                        'product_id' => $colorProduct->id,
                        'image' => $imagePath
                    ]);
                }
            }

            // Add sizes
            foreach ($colorData['sizes'] ?? [] as $sizeData) {
                if (!isset($sizeData['size'], $sizeData['stock']))
                    continue;

                $colorProduct->sizes()->create([
                    'size' => $sizeData['size'],
                    'stock' => $sizeData['stock'],
                ]);
            }
        }

        return redirect()->back()->with('success', 'Product added successfully!');
    }

}

