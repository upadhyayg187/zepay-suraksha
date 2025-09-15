<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Fetch all active products, sorted by category and then by name
        $products = Product::where('is_active', true)
                            ->orderBy('category')
                            ->orderBy('name')
                            ->get();

        return response()->json($products);
    }


    /**
     * Display the specified resource.
     */
    public function show(string $slug)
    {
        // Find a single product by its unique slug
        $product = Product::where('slug', $slug)->where('is_active', true)->firstOrFail();

        return response()->json($product);
    }
}
