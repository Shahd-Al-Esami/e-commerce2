<?php

namespace App\Http\Controllers\Api;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\ProductRequest;
use App\Http\Traits\UploadImageTrait;
use App\Models\Category_Product;

class ProductController extends Controller
{
    use UploadImageTrait;

    public function index(Request $request)
    {
        $search = $request->input('search');

        if ($search) {
            $categoryIds = Category::where('name', 'LIKE', '%' . $search . '%')->pluck('id');

            $categoryProducts = Category_Product::whereIn('category_id', $categoryIds)->pluck('product_id');

            // Get the products using the category IDs
            $products = Product::whereIn('id', $categoryProducts)->paginate(4);
        } else {
            $products = Product::paginate(8);
        }

        return response()->json($products);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ProductRequest $request)
    {
        $imagePath = $this->uploadImage($request, 'products-image'); // Call the trait method

        $product = Product::create([
            'title' => $request->title,
            'description' => $request->description,
            'price' => $request->price,
            'amount' => $request->amount,
            'path' => $imagePath,
        ]);

        $product->categories()->attach($request->category_ids);

        return response()->json($product, 201); // 201 Created
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        return response()->json($product);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ProductRequest $request, Product $product)
    {
        $imagePath = $this->uploadImage($request, 'products-image'); // Call the trait method

        $product->update([
            'title' => $request->title,
            'description' => $request->description,
            'price' => $request->price,
            'amount' => $request->amount,
            'path' => $imagePath,
        ]);

        $product->categories()->sync($request->category_ids);

        return response()->json($product);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        $product->delete();
        return response()->json(['message' => 'Product deleted successfully']);
    }

    public function showDeletedItems()
    {
        $products = Product::onlyTrashed()->get();
        return response()->json($products);
    }

    public function restore($id)
    {
        $product = Product::withTrashed()->findOrFail($id);
        $product->restore();

        return response()->json(['message' => 'Product restored successfully']);
    }

    public function forceDelete($id)
    {
        $product = Product::findOrFail($id);
        $product->forceDelete();

        return response()->json(['message' => 'Product permanently deleted successfully']);
    }
}
