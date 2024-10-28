<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CategoryController;



Route::get('/', function () {
    return view('welcome');
})->name('welcome');



//dashboard for admins
Route::middleware(['CheckAdmin'])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});



Auth::routes();


//product


Route::get('products/restore/{id}', [ProductController::class, 'restore'])->name('restore')->middleware(['CheckAdmin']);
Route::delete('products/forceDelete/{id}', [ProductController::class, 'forceDelete'])->name('forceDelete')->middleware(['CheckAdmin']);
Route::get('products/showDeletedItems', [ProductController::class, 'showDeletedItems'])->name('showDeletedItems')->middleware(['CheckAdmin']);

Route::get('products', [ProductController::class, 'index'])->name('products.index');

Route::resource('products', ProductController::class)->except('index')->middleware(['CheckAdmin']);


//user
// Route::resource('users', UserController::class)->middleware('auth');
Route::delete('users/{user}/destroy', [UserController::class, 'destroy'])->name('users.destroy')->middleware(['CheckAdmin']);
Route::get('users/{user}/show', [UserController::class, 'show'])->name('users.show')->middleware(['CheckAdmin']);
Route::get('users', [UserController::class, 'index'])->name('users.index')->middleware(['CheckAdmin']);


//category
Route::get('categories', [CategoryController::class, 'index'])->name('categories.index');

Route::resource('categories', CategoryController::class)->except('index')->middleware(['CheckAdmin']);



//order

Route::post('products/order/{id}', [OrderController::class, 'create'])->name('orders.create')->middleware(['auth']);
Route::post('store/order/{id}', [OrderController::class, 'store'])->name('orders.store')->middleware(['auth']);
Route::get('orders', [OrderController::class, 'index'])->name('orders.index')->middleware(['CheckAdmin']);


Route::post('orders/pay/{order}', [OrderController::class, 'pay'])->name('orders.pay')->middleware(['CheckUser']);
Route::delete('orders/destroy/{order}', [OrderController::class, 'destroy'])->name('orders.destroy')->middleware(['CheckUser']);
Route::get('orders/{order}/edit', [OrderController::class, 'edit'])->name('orders.edit')->middleware(['CheckUser']);
Route::put('orders/{order}/update', [OrderController::class, 'update'])->name('orders.update')->middleware(['CheckUser']);
Route::get('orders/{order}/show', [OrderController::class, 'show'])->name('orders.show')->middleware(['CheckUser']);

Route::get('/userOrders', [OrderController::class, 'userOrders'])->name('userOrders');

//sales
Route::get('sales', [OrderController::class, 'getSales'])->name('sales')->middleware(['CheckAdmin']);


