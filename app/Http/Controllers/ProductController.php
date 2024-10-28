<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\Category_Product;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\ProductRequest;
use App\Http\Traits\UploadImageTrait;

class ProductController extends Controller
{
     use UploadImageTrait;

    public function index(Request $request)
    {
        $search=$request->input('search');

        if($search){
            $categoryIds = Category::where('name', 'LIKE', '%' . $search . '%')->pluck('id');

            $categoryProducts = Category_Product::whereIn('category_id', $categoryIds)->pluck('product_id');

            $products = Product::whereIn('id', $categoryProducts)->get();
        } else {
            $products=Product::all();
        }


        return view('product.index',['products'=>$products]);
    }

    public function create()
    {
        $categories=Category::all();

        return view('product.create',compact('categories'));

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ProductRequest $request)
    {
        $imagePath = $this->uploadImage($request,'products-image'); // Call the trait method with $request



    $product=Product::create([

        'title' => $request->title,
        'description'=>$request->description,
        'price' => $request->price,
        'amount' => $request->amount,
        'path' => $imagePath,
    ]);

    $product->categories()->attach($request->category_ids);
    return redirect()->route('products.index',);
}





    public function show(Product $product)
    {

        return view('product.show',['product'=>$product]);

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        $categories=Category::all();
        return view('product.edit',['product'=>$product,'categories'=>$categories]);

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ProductRequest $request, Product $product)
      {
          $imagePath = $this->uploadImage($request,'products-image'); // Call the trait method with $request

             $product->update([
            'title' => $request->title,
            'description'=>$request->description,
            'price' => $request->price,
            'amount' => $request->amount,

            'path' => $imagePath,

        ]);
    $product->categories()->sync($request->category_ids);


        return redirect()->route('products.index');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        $product->delete();
        return redirect()->route('products.index');


    }
    public function showDeletedItems(){
    $products=Product::onlyTrashed()->get();
    return view('product.deletedItems',['products'=>$products]);



}
public function restore($id){
    // dd($request->all());
    $product=Product::withTrashed()->findOrfail($id);
   $product->restore();


return redirect(route('products.index'));

}


    public function forceDelete( $id)
    {
        $product=Product::findOrfail($id);
          $product->forceDelete();

       return redirect(route('products.index'));

}


}
