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
             {
            $category = Category::findOrFail($id);

            // Get all products related to this category
            $productRelations = $category->products;

            foreach ($productRelations as $productRelation) {

                if ($productRelation->categories()->count() == 1) {

                $product=Product::findOrfail($productRelation->id);
                $product->forceDelete();

                } else {
                    $productRelation->categories()->detach($category->id);
                }
            }

            $category->delete();

            return redirect()->route('categories.index')->with('success', 'Category and related products deleted successfully');
          }






}
