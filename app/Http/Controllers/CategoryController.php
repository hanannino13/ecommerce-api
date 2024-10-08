<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
{
    return Category::all();
}

public function store(Request $request)
{
    $request->validate([
        'title' => 'required|string|max:255',
        'image' => 'nullable|image|mimes:jpg,jpeg,png,gif|max:2048', 
    ]);

    $category = Category::create($request->all());
    return response()->json($category, 201);
}

public function show(Category $category)
{
    return $category->load('products');
}

public function update(Request $request, Category $category)
{
    $request->validate([
        'title' => 'required|string|max:255',
        'image' => 'nullable|image|mimes:jpg,jpeg,png,gif|max:2048',
    ]);

    $category->update($request->all());
    return response()->json($category, 200);
}

public function destroy(Category $category)
{
    $category->delete();
    return response()->json(null, 204);
}
}
