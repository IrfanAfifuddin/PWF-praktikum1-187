<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use App\Models\User;
use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class ProductController extends Controller
{
    use AuthorizesRequests;

    public function index()
    {
        $products = Product::all();
        return view('product.index', compact('products'));
    }

    public function store(StoreProductRequest $request)
    {
        $this->authorize('create', Product::class);

        // Validation is automatically handled by StoreProductRequest
        $validated = $request->validated();

        Product::create($validated);

        return redirect()->route('product.index')->with('success', 'Product created successfully.');
    }

    public function create()
    {
        $this->authorize('create', Product::class);
        $users = User::orderBy('name')->get();
        $categories = Category::orderBy('name')->get();
        return view('product.create', compact('users', 'categories'));
    }

    public function show($id)
    {
        $product = Product::findOrFail($id);
        $this->authorize('view', $product);
        return view('product.show', compact('product'));
    }

    public function update(UpdateProductRequest $request, $id)
    {
        $product = Product::findOrFail($id);
        $this->authorize('update', $product);

        // Validation is automatically handled by UpdateProductRequest
        $validated = $request->validated();

        $product->update($validated);

        return redirect()->route('product.index')->with('success', 'Product updated successfully.');
    }

    public function edit(Product $product)
    {
        $this->authorize('update', $product);
        $users = User::orderBy('name')->get();
        $categories = Category::orderBy('name')->get();
        return view('product.edit', compact('product', 'users', 'categories'));
    }

    public function delete($id)
    {
        $product = Product::findOrFail($id);
        $this->authorize('delete', $product);
        
        $product->delete();
        
        return redirect()->route('product.index')->with('success', 'Product berhasil dihapus');
    }

    public function export()
    {
        return "Ini adalah halaman export produk. Hanya Admin yang bisa melihat halaman ini.";
    }
}
