<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\Api\OrderController;
use App\Http\Controllers\Api\ProductController;
use App\Http\Controllers\Api\CategoryController;



Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});



Route::post('register', [AuthController::class, 'register']);
Route::post('login', [AuthController::class, 'login']);
Route::middleware('auth:sanctum')->post('logout', [AuthController::class, 'logout']);



// Define API routes for categories/costomer+admin
Route::get('/categories', [CategoryController::class, 'index']);       // Get all categories

// for admin
// Route::middleware(['CheckAdmin','auth:sanctum'])->prefix('categories')->group(function () {
//     Route::post('/', [CategoryController::class, 'store']);      // Create a new category
//     Route::get('/{category}', [CategoryController::class, 'show']); // Get a specific category
//     Route::put('/{category}', [CategoryController::class, 'update']); // Update a specific category
//     Route::delete('/{category}', [CategoryController::class, 'destroy']); // Delete a specific category
// });

// Define API routes for products/costomer+admin

Route::get('/products', [ProductController::class, 'index']);      // Get all products & by categories

//for admin

// Route::middleware(['CheckAdmin','auth:sanctum'])->prefix('products')->group(function () {
//     Route::get('/trashed', [ProductController::class, 'showDeletedItems']); // Show trashed products

//     Route::post('/', [ProductController::class, 'store']);     // Create a new product
//     Route::get('/{product}', [ProductController::class, 'show']); // Get a specific product
//     Route::put('/{product}', [ProductController::class, 'update']); // Update a specific product
//     Route::delete('/{product}', [ProductController::class, 'destroy']);  // Delete a specific product

//     Route::post('/restore/{id}', [ProductController::class, 'restore']); // Restore a deleted product
//     Route::delete('/force-delete/{id}', [ProductController::class, 'forceDelete']); // Permanently delete a product
// });


// Define API routes for orders
//costomer
Route::middleware('auth:sanctum')->prefix('orders')->group(function () {
    Route::get('/user-orders', [OrderController::class, 'userOrders']); // Get user orders


    Route::post('/{id}', [OrderController::class, 'store']); // Create a new order: place an order
    Route::get('/{order}', [OrderController::class, 'show'])->name('orders.show')->middleware('CheckUserApi');         // Get a specific order by owner of order or admin
    Route::put('/{order}', [OrderController::class, 'update'])->name('orders.update')->middleware('CheckUserApi');       // Update a specific order by owner of order
    Route::delete('/{order}', [OrderController::class, 'destroy'])->name('orders.destroy')->middleware('CheckUserApi');   // Delete a specific order by owner of order or admin

    Route::post('/pay/{order}', [OrderController::class, 'pay'])->name('orders.pay')->middleware('CheckUserApi');        // Pay for an order by owner of order

});

//for admin
// Route::middleware(['auth:sanctum','CheckAdmin'])->prefix('orders')->group(function () {
//     Route::get('/sales', [OrderController::class, 'getSales']);// Get completed sales

// Route::get('/', [OrderController::class, 'index']);               // Get all orders
// });
