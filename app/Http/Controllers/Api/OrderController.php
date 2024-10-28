<?php

namespace App\Http\Controllers\Api;

use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Requests\OrderRequest;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;

class OrderController extends Controller
{
    public function index()
    {
        $products = Product::withTrashed()->get();
        $orders = Order::all();

        return response()->json(['orders' => $orders, 'products' => $products]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create($id)
    {
        $product = Product::findOrFail($id);

        return response()->json($product);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(OrderRequest $request, $id)
    {
        $product = Product::findOrFail($id);
        $price = $product->price;
        $quantity = $request->input('quantity');
        $total = $price * $quantity;

        if ($product->amount < $quantity) {
            return response()->json(['message' => 'Sorry, you can\'t order this amount; not enough stock.'], 400); // Bad Request
        }
        $user_id = auth()->user()->id;

        $order = Order::create([
            'product_id' => $request->id,
            'price' => $price,
            'quantity' => $request->quantity,
             'user_id' => $user_id,
            'total' => $total,
            'status' => 'inProgress',
            'paymentMethod' => $request->input('paymentMethod')[0],
        ]);

        $product->amount -= $quantity;
        $product->save();

        return response()->json($order, 201); // 201 Created
    }




    /**
     * Display the specified resource.
     */
    public function show(Order $order)
    {
        return response()->json($order);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(OrderRequest $request, Order $order)
    {
        $product = Product::findOrFail($order->product_id);

        // Store the old quantity to adjust stock appropriately
        $oldQuantity = $order->quantity;
        $newQuantity = $request->input('quantity');

        // Get the current price and calculate the total
        $price = $order->price;
        $total = $price * $newQuantity;

        // Check if there’s enough stock for the new quantity
        if ($product->amount + $oldQuantity < $newQuantity) {
            return response()->json(['message' => 'Sorry, you can\'t order this amount; not enough stock.'], 400); // Bad Request
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

        return response()->json(['message' => 'Order updated successfully.', 'order' => $order]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Order $order)
    {
        $order->delete();
        return response()->json(['message' => 'Order deleted successfully.']);
    }

    public function pay(Order $order)
    {
        $order->status = 'completed';
        $order->save();

        return response()->json(['message' => 'Order status is completed!']);
    }

    public function getSales()
    {
        $sales = Order::where('status', 'completed')->get();
        return response()->json(['sales' => $sales]);
    }

    public function userOrders()
    {
        if (Auth::check()) {
            $user = Auth::user();
            $orders = $user->orders;
            Log::info('User orders accessed', ['user_id' => $user->id, 'orders' => $orders]);

            return response()->json(['orders' => $orders]);
        } else {
            return response()->json(['message' => 'Unauthorized'], 401); // Unauthorized
        }
    }
}
