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
    public function index(Request $request)
    {
        // Start with a base query
        $query = Product::query();

        // Filter by category if the parameter exists
        if ($request->has('category') && $request->input('category')) {
            $query->where('category', $request->input('category'));
        }

        // Filter by provider if the parameter exists
        if ($request->has('provider') && $request->input('provider')) {
            $query->where('provider', $request->input('provider'));
        }
        
        // You can add a search filter like this in the future
        // if ($request->has('search') && $request->input('search')) {
        //     $query->where('name', 'like', '%' . $request->input('search') . '%');
        // }

        // Execute the query and get the results
        $products = $query->get();

        return response()->json($products);
    }


    /**
     * Display the specified resource.
     */
    public function show(string $slug)
    {
        $product = Product::where('slug', $slug)->firstOrFail();
        return response()->json($product);
    }
}