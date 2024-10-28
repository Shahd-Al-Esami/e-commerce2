<?php

namespace App\Http\Controllers\Api;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\CategoryRequest;

class CategoryController extends Controller
{
    public function index()
    {
        $cats = Category::all();
        return response()->json($cats);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CategoryRequest $request)
    {
        $cat = Category::create(['name' => $request->name]);
        return response()->json($cat, 201); // 201 Created
    }

    /**
     * Display the specified resource.
     */
    public function show(Category $category)
    {
        return response()->json($category);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CategoryRequest $request, Category $category)
    {
        $category->update(['name' => $request->name]);
        return response()->json($category);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $category = Category::findOrFail($id);

        $productRelations = $category->products;

        foreach ($productRelations as $productRelation) {
            // Check if the product has only this category
            if ($productRelation->categories()->count() == 1) {
                $product = Product::findOrFail($productRelation->id);
                $product->forceDelete(); // Delete the product if it has only this category
            } else {
                // If it has other categories, detach this category
                $productRelation->categories()->detach($category->id);
            }
        }

        $category->delete();

        // Return a JSON response
        return response()->json(['message' => 'Category and related products deleted successfully']);
    }
}
