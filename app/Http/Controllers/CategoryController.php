<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Listing;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Category::whereNull('parent_id')
            ->with('children')
            ->get();

        return view('categories.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('categories.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $category = Category::with(['parent', 'children'])->findOrFail($id);

        $parentCategory = $category->parent ?: $category;

        $siblingCategories = $parentCategory->children;

        if ($category->parent_id === null) {
            $activeCategory = $siblingCategories->first() ?: $category;
        } else {
            $activeCategory = $category;
        }

        $listings = Listing::with(['category.parent', 'user'])
            ->where('category_id', $activeCategory->id)
            ->latest()
            ->get();

        return view('categories.show', compact(
            'category',
            'parentCategory',
            'siblingCategories',
            'activeCategory',
            'listings'
        ));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}