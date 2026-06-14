<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Listing;
use Illuminate\Http\Request;

class ListingController extends Controller
{
    public function create(Category $category = null)
    {
        if (!$category || $category->parent_id === null) {
            abort(404);
        }

        return view('listings.create', compact('category'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'description' => ['required'],
            'price' => ['required', 'numeric'],
            'category_id' => ['required', 'exists:categories,id'],
        ]);

        $listing = Listing::create([
            'user_id' => auth()->id(),
            'category_id' => $validated['category_id'],
            'title' => $validated['title'],
            'description' => $validated['description'],
            'price' => $validated['price'],
            'status' => 'active',
        ]);

        return redirect()->route('lots.show', $listing->category_id);
    }

    public function show(string $id)
    {
        $listing = Listing::with(['category.parent', 'user'])->findOrFail($id);

        return view('listings.show', compact('listing'));
    }

    public function destroy(string $id)
    {
        $listing = Listing::findOrFail($id);

        if (
            auth()->id() !== $listing->user_id &&
            auth()->user()->role?->name !== 'admin'
        ) {
            abort(403);
        }

        $categoryId = $listing->category_id;

        $listing->delete();

        return redirect()->route('lots.show', $categoryId);
    }
}