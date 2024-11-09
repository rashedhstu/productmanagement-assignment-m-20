<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{

    public function index(Request $request)
    {
        $products = Product::query();

        // Search functionality
        if ($request->has('search')) {
            $products->where('product_id', 'like', "%{$request->search}%")
                    ->orWhere('description', 'like', "%{$request->search}%");
        }

        // Sorting functionality
       // Sorting functionality with order toggle
        if ($request->has('sort')) {
            $sortField = $request->get('sort');
            $sortOrder = $request->has('sort_order') && $request->get('sort_order') == 'desc' ? 'desc' : 'asc';
            $products->orderBy($sortField, $sortOrder);
        }


        $products = $products->paginate(10);
        return view('products.index', compact('products'));
    }

    public function create()
    {
        return view('products.create');
    }
    public function store(Request $request)
    {
        $request->validate([
            'product_id' => 'required|unique:products',
            'name' => 'required',
            'price' => 'required|numeric',
        ]);

        $product = new Product($request->all());

        // Handle file upload
        if ($request->hasFile('image')) {
            $product->image = $request->file('image')->store('images', 'public');
        }

        $product->save();

        return redirect()->route('products.index')->with('success', 'Product created successfully');
    }

    public function show($id)
    {
        $product = Product::findOrFail($id);
        return view('products.show', compact('product'));
    }

    public function edit($id)
    {
        $product = Product::findOrFail($id);
        return view('products.edit', compact('product'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'price' => 'required|numeric',
        ]);

        $product = Product::findOrFail($id);
        $product->fill($request->all());

        // Handle file upload
        if ($request->hasFile('image')) {
            $product->image = $request->file('image')->store('images', 'public');
        }

        $product->save();

        return redirect()->route('products.index')->with('success', 'Product updated successfully');
    }
    public function destroy($id)
    {
        $product = Product::findOrFail($id);
        $product->delete();

        return redirect()->route('products.index')->with('success', 'Product deleted successfully');
    }







}
