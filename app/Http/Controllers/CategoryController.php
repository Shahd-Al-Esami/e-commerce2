<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Requests\CategoryRequest;

class CategoryController extends Controller
{



    public function index()
    {
        $cats=Category::all();
        return view('category.index',['category'=>$cats]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('category.create');

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CategoryRequest $request)
    {
       $cat= Category::create(['name' => $request->name]);
       return redirect(route('categories.store'));

    }

    /**
     * Display the specified resource.
     */
    public function show(Category $category)
    {
        return view('category.show',['category'=>$category]);

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $category)
    {
        return view('category.edit',['category'=>$category]);

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CategoryRequest $request, Category $category)
    {

        $category->update([
            'name' => $request->name,

        ]);
        return redirect(route('categories.index'));

    }




        public function destroy($id)
             {            // Find the category by its ID
            $category = Category::findOrFail($id);

            // Get all products related to this category
            $productRelations = $category->products;

            // Loop through each product related to the category
            foreach ($productRelations as $productRelation) {

                // Check if the product has only this category
                if ($productRelation->categories()->count() == 1) {

                $product=Product::findOrfail($productRelation->id);
                $product->forceDelete();

                    // If it has only this category, delete the product
                } else {
                    // If it has other categories, detach this category
                    $productRelation->categories()->detach($category->id);
                }
            }

            // Now delete the category itself
            $category->delete();

            // Return a response (could be a redirect or JSON response)
            return redirect()->route('categories.index')->with('success', 'Category and related products deleted successfully');
          }






}
