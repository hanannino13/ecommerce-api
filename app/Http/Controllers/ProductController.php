<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
{
    return Product::all();
}

public function store(Request $request)
{
    $request->validate([
        'title' => 'required',
        'description' => 'required',
        'price' => 'required|numeric',
        'quantity' => 'required|integer',
        'cat_id' => 'required|exists:categories,id',
    ]);

    $product = Product::create($request->all());
    return response()->json($product, 201);
}

public function show(Product $product)
{
    return $product;
}

public function update(Request $request, Product $product)
{
    $request->validate([
        'title' => 'required',
        'description' => 'required',
        'price' => 'required|numeric',
        'quantity' => 'required|integer',
        'cat_id' => 'required|exists:categories,id',
    ]);

    $product->update($request->all());
    return response()->json($product, 200);
}

public function destroy(Product $product)
{
    $product->delete();
    return response()->json(null, 204);
}
}
