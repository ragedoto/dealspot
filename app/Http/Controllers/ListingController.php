<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Listing;
use Illuminate\Http\Request;

class ListingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $listings = Listing::with(['category', 'user'])
        ->latest()
        ->get();

    return view('listings.index', compact('listings'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();

        return view('listings.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
        'title' => ['required', 'string', 'max:255'],
        'description' => ['required'],
        'price' => ['required', 'numeric'],
        'category_id' => ['required', 'exists:categories,id'],
    ]);

    Listing::create([
        'user_id' => auth()->id(),
        'category_id' => $validated['category_id'],
        'title' => $validated['title'],
        'description' => $validated['description'],
        'price' => $validated['price'],
        'status' => 'active',
    ]);

    return redirect()->route('listings.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $listing = Listing::with(['category', 'user'])->findOrFail($id);

        return view('listings.show', compact('listing'));
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
