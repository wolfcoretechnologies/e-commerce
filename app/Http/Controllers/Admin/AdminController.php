<?php

namespace App\Http\Controllers\Admin;
use App\Models\Banner;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function show()
    {
        $banners = Banner::where('status', 'active')->get();
        return view('admin.banner', compact('banners'));
    }
    public function profile()
    {
        return view('admin.profile');
    }
    public function orders()
    {
        return view('admin.orders');
    }
    public function store(Request $request)
    {
        // If the request is a POST, handle form submission
        if ($request->isMethod('post')) {
            // Validate inputs
            $request->validate([
                'title' => 'required|string|max:255',
                'image' => 'required|string',
                'content' => 'nullable|string',
            ]);

            $status = $request->has('status') ? 'active' : 'inactive';

            // Store uploaded image

            // Create banner
            Banner::create([
                'title' => $request->title,
                'image' => $request->image,
                'content' => $request->content,
                'status' => $status,
            ]);

            return redirect()->back()->with('success', 'Banner created successfully.');
        }

        // If not POST, show the create banner view
        return view('admin.addbanner');
    }

    public function uploadTempImage(Request $request)
    {
        $request->validate([
            'file' => 'required',
            'file.*' => 'image|mimes:jpeg,png,jpg,webp|max:2048',
            'folder' => 'nullable|string'
        ]);

        $folder = $request->input('folder', 'uploads');

        $files = $request->file('file');

        $paths = [];

        if (is_array($files)) {
            // Multiple images
            foreach ($files as $file) {
                $paths[] = $file->store($folder, 'public');
            }
        } else {
            // Single image
            $paths[] = $files->store($folder, 'public');
        }

        return response()->json(['paths' => $paths]);
    }





}
