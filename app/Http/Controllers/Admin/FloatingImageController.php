<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\FloatingImage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class FloatingImageController extends Controller
{
    public function index()
    {
        $floatingImages = FloatingImage::latest()->get();

        return view(
            'admin.floating-images.view',
            compact('floatingImages')
        );
    }

    public function create()
    {
        return view('admin.floating-images.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'nullable|string|max:255',
            'image' => 'required|image|mimes:jpg,jpeg,png,webp|max:2048|dimensions:width=3822,height=894',
            'is_active' => 'nullable|boolean',
        ]);

        $validated['image'] = $request->file('image')
            ->store('floating-images', 'public');

        $validated['is_active'] = $request->boolean('is_active');

        FloatingImage::create($validated);

        return redirect()
            ->route('admin.floating-images.index')
            ->with('success', 'Image added successfully.');
    }

    public function edit(FloatingImage $floatingImage)
    {
        return view(
            'admin.floating-images.edit',
            compact('floatingImage')
        );
    }

    public function update(
        Request $request,
        FloatingImage $floatingImage
    ) {
        $validated = $request->validate([
            'title' => 'nullable|string|max:255',
            'image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048|dimensions:width=3822,height=894',
            'is_active' => 'nullable|boolean',
        ]);

        if ($request->hasFile('image')) {
            if ($floatingImage->image) {
                Storage::disk('public')->delete($floatingImage->image);
            }

            $validated['image'] = $request->file('image')
                ->store('floating-images', 'public');
        } else {
            unset($validated['image']);
        }

        $validated['is_active'] = $request->boolean('is_active');

        $floatingImage->update($validated);

        return redirect()
            ->route('admin.floating-images.index')
            ->with('success', 'Image updated successfully.');
    }

    public function destroy(FloatingImage $floatingImage)
    {
        if ($floatingImage->image) {
            Storage::disk('public')->delete($floatingImage->image);
        }

        $floatingImage->delete();

        return redirect()
            ->route('admin.floating-images.index')
            ->with('success', 'Image deleted successfully.');
    }
}
