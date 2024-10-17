<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CartController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\MerchantController;
use App\Http\Controllers\DashboardController;

// Route::get('/login', function () {
//     return view('login');
// })->name('login');
// Route::get('/register', function () {
//     return view('register');
// })->name('register');

Route::get('/', [LoginController::class, 'index'])->name('login');
Route::post('/login_proses', [LoginController::class, 'login_proses'])->name('login_proses');
Route::get('/logout', [LoginController::class, 'logout'])->name('logout');

Route::get('/register', [LoginController::class, 'register'])->name('register');
Route::post('/register_proses', [LoginController::class, 'register_proses'])->name('register_proses');


Route::middleware(['auth'])->prefix('admin')->group(function () {

    Route::get('dashboard', [DashboardController::class, 'dashboard'])->name('dashboard');
    Route::get('merchant', [MerchantController::class, 'index'])->name('merchant.index');
    Route::get('merchant/create', [MerchantController::class, 'create'])->name('merchant.create');
    Route::post('merchant/store', [MerchantController::class, 'store'])->name('merchant.store');
    Route::put('merchant/edit', [MerchantController::class, 'edit'])->name('merchant.edit');

    Route::get('merchants/{merchant}/menus/create', [MerchantController::class, 'createMenu'])->name('merchant.menus.create');
    Route::post('merchants/{merchant}/menus', [MerchantController::class, 'storeMenu'])->name('merchant.menus.store');
    Route::get('merchants/{merchant}/menus', [MerchantController::class, 'showMenus'])->name('merchant.menus.index');
    Route::get('menus/{menu}/edit', [MerchantController::class, 'editMenu'])->name('menus.edit');
    Route::put('menus/{menu}', [MerchantController::class, 'updateMenu'])->name('menus.update');
    Route::delete('menus/{menu}', [MerchantController::class, 'destroymenu'])->name('menus.destroy');


    Route::delete('/cart/remove/{menuId}', [CartController::class, 'remove'])->name('cart.remove');
    Route::post('/store/{menu}', [CartController::class, 'store'])->name('cart.store');
    Route::get('home', [CustomerController::class, 'home'])->name('home');
    Route::get('cart', [CartController::class, 'index'])->name('cart.index');


    Route::get('merchants/{merchant}/orders', [MerchantController::class, 'showOrders'])->name('merchant.orders.index');
    Route::delete('/merchant/{id}', [MerchantController::class, 'destroy'])->name('merchant.destroy');
    Route::get('/merchant/{id}/edit', [MerchantController::class, 'edit'])->name('merchant.edit');
    Route::put('/merchant/{id}', [MerchantController::class, 'update'])->name('merchant.update');



    Route::get('orders', [OrderController::class, 'index'])->name('orders.index');
    Route::post('/checkout', [CartController::class, 'checkout'])->name('checkout');



    Route::get('/invoice/print', [CartController::class, 'printInvoice'])->name('invoice.print');
});
