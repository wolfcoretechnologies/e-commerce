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

        foreach ($request->colors as $colorData) {
            $color = $product->colors()->create([
                'color_name' => $colorData['name'],
                'color_image' => $colorData['image'],
            ]);

            foreach ($colorData['sizes'] ?? [] as $sizeData) {
                // Ensure both 'size' and 'stock' exist
                if (!array_key_exists('size', $sizeData) || !array_key_exists('stock', $sizeData)) {
                    // Optional: Log or debug malformed input
                    \Log::warning('Invalid sizeData entry:', $sizeData);
                    continue;
                }

                // Create size entry
                $color->sizes()->create([
                    'size' => $sizeData['size'],
                    'stock' => $sizeData['stock'],
                ]);
            }

        }

        return redirect()->back()->with('success', 'Product added successfully!');
    }

}

