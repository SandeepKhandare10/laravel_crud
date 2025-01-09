<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    /**
     * Display a listing of the products with optional search.
     */
    public function index(Request $request)
    {
        $search = $request->input('search'); // Retrieve the search term
        $products = Product::query();

        if ($search) {
            $products->where('name', 'like', "%{$search}%")
                     ->orWhere('description', 'like', "%{$search}%");
        }

        return view('products.index', [
            'products' => $products->get(), // Fetch all matching products
            'search' => $search // Pass the search term back to the view
        ]);
    }

    /**
     * Show the form for creating a new product.
     */
    public function create()
    {
        return view('products.create');
    }

    /**
     * Store a newly created product in the database.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:100',
            'qty' => 'required|integer|min:1',
            'price' => 'required|numeric|min:0.01',
            'description' => 'nullable|string|max:200'
        ]);

        Product::create($data);

        return redirect(route('product.index'))->with('success', 'Product created successfully!');
    }

    /**
     * Show the form for editing the specified product.
     */
    public function edit(Product $product)
    {
        return view('products.edit', ['product' => $product]);
    }

    /**
     * Update the specified product in the database.
     */
    public function update(Request $request, Product $product)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'qty' => 'required|integer|min:1',
            'price' => 'required|numeric|min:0.01',
            'description' => 'nullable|string|max:1000'
        ]);

        $product->update($data);

        return redirect(route('product.index'))->with('success', 'Product updated successfully!');
    }

    /**
     * Remove the specified product from the database.
     */
    public function destroy(Product $product)
    {
        $product->delete();

        return redirect(route('product.index'))->with('success', 'Product deleted successfully!');
    }

    /**
     * Search products based on name or description.
     */
    public function search(Request $request)
    {
        $search = $request->input('search');
        $products = Product::where('name', 'like', "%{$search}%")
                           ->orWhere('description', 'like', "%{$search}%")
                           ->get();

        return view('products.index', [
            'products' => $products,
            'search' => $search
        ]);
    }
}
