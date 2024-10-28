<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Requests\OrderRequest;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{



    public function index()
  {  $products=Product::withTrashed()->get();

       $orders=Order::all();
        return view('order.index',['orders'=>$orders,'products'=>$products]);

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create($id)
    {
        $product=Product::findOrfail($id);

        return view('order.create',['product'=>$product]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(OrderRequest $request,$id)
    {
        $product_id = Product::findOrFail($id);

        $user_id=Auth::user()->id;
        $price=$product_id->price;
        $quantity = $request->input('quantity');
        $total=$price *$quantity;

        if ($product_id->amount < $quantity) {
            session()->flash('alert', 'Sorry, you can\'t order this amount; not enough stock.');
            Log::info('Redirecting due to insufficient stock. Alert set: ' . session('alert'));

            return redirect()->route('products.index'); // Redirect to product index
                }

        // dd($id);

       Order::create([
        'product_id' => $id,
        'price' => $price,
        'quantity' => $quantity,
        'user_id' => $user_id,
        'total' => $total,
        'status' => 'inProgress',
        'paymentMethod' => $request->input('paymentMethod')[0],
    ]);
    $product_id->amount -= $quantity;
    $product_id->save();


    return redirect()->route('userOrders');

    }

    /**
     * Display the specified resource.
     */
    public function show(Order $order)
    {
        return view('order.show',['order'=>$order]);

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Order $order)
    {
        return view('order.edit',['order'=>$order]);

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(OrderRequest $request, Order $order)
    {
        $id = $order->product_id;
        $product = Product::findOrFail($id);

        // Store the old quantity to adjust stock appropriately
        $oldQuantity = $order->quantity;
        $newQuantity = $request->input('quantity');

        // Get the current price and calculate the total
        $price = $order->price;
        $total = $price * $newQuantity;

        // Check if there’s enough stock for the new quantity
        if ($product->amount + $oldQuantity < $newQuantity) {
            session()->flash('alert', 'Sorry, you can\'t order this amount; not enough stock.');
            Log::info('Redirecting due to insufficient stock. Alert set: ' . session('alert'));

            return redirect()->route('products.index');
        }

        // Update the order with the new quantity and total
        $order->update([
            'quantity' => $newQuantity,
            'total' => $total,
            'paymentMethod' => $request->input('paymentMethod')[0],
        ]);

        // Update the product stock amount
        $product->amount += $oldQuantity;
        $product->amount -= $newQuantity;

        $product->save();

        session()->flash('success', 'Order updated successfully.');
        // return redirect()->route('orders.index');
    return redirect()->route('userOrders');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Order $order)
    {
        $order->delete();
     return redirect()->route('userOrders');

    }
    public function pay(Order $order){
    //  $order=Order::findOrfail($id);
     $order->status='completed';
     $order->save();

     return redirect()->route('userOrders')->with('status', 'Order status is completed!');
 }
    public function getSales(){
        if($sales = Order::where('status', 'completed')->get() )

        return view('order.sales',['sales'=>$sales]);
        else{
        return view('sales',);

        }

 }

 public function userOrders()
 {
     if (Auth::check()) {
         $user = Auth::user();
         $orders = $user->orders;
         Log::info('User orders accessed', ['user_id' => $user->id, 'orders' => $orders]);

          return view('order.userOrders',compact('orders') );
     }
else{

     return redirect()->route('login');


 }

}}
