<?php

use App\Http\Controllers\CartController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\DownloadInvoiceController;
use App\Http\Controllers\FavoriteController;
use App\Http\Controllers\InvoiceController;
use App\Http\Controllers\MerchantSettings;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SettingsController;
use Illuminate\Support\Facades\Route;


Route::middleware('auth:merchant')->name('merchant.')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::post('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    ##.......................................................Products Routes
    Route::resource('products', ProductController::class);
    Route::get('/all/products', [ProductController::class, 'merchantProducts'])->name('products.merchantProducts');
    Route::get('/produsct/{product}/details', [ProductController::class, 'productDetails'])->name('products.productDetails');
    Route::get('/prodcts/search', [ProductController::class, 'merchantSearch'])->name('products.merchantSearch');
    Route::get('/all/sortPrice', [ProductController::class, 'sortEndPrice'])->name('products.sortEndPrice');
    Route::get('/all/sortBasePrice', [ProductController::class, 'sortBasePrice'])->name('products.sortBasePrice');

    ##.......................................................Cart Routes
    Route::resource('cart', CartController::class);
    Route::post('cart/add/{product}', [CartController::class, 'add'])->name('cart.add');
    Route::delete('/cart/{product}/delete', [CartController::class, 'delete'])->name('cart.delete');

    ##.......................................................Cart Routes
    Route::resource('favorite', FavoriteController::class);
    Route::post('favorite/add/{product}', [FavoriteController::class, 'add'])->name('favorite.add');
    Route::delete('/favorite/{product}/delete', [FavoriteController::class, 'delete'])->name('favorite.delete');

    ##.............................................................................................Order Routes
    Route::resource('order', OrderController::class);
    Route::get('order/{order}/details', [OrderController::class, 'details'])->name('orders.details');
    Route::get('orders/unpaid', [OrderController::class, 'unpaidOrders'])->name('orders.unpaid');
    Route::get('orders/pending', [OrderController::class, 'pendingOrders'])->name('orders.pending');
    Route::get('orders/paid', [OrderController::class, 'paidOrders'])->name('orders.paid');
    Route::get('orders/completed', [OrderController::class, 'completedOrders'])->name('orders.completed');
    Route::get('orders/overdue', [OrderController::class, 'overdueOrders'])->name('orders.overdue');
    Route::get('orders/back', [OrderController::class, 'goBack'])->name('orders.goBack');


    ##.............................................................................................Invoices Routes
    Route::resource('invoice', InvoiceController::class);
    Route::get('invoices/unpaid', [InvoiceController::class, 'unpaidInvoices'])->name('invoices.unpaid');
    Route::get('invoices/pending', [InvoiceController::class, 'pendingInvoices'])->name('invoices.pending');
    Route::get('invoices/paid', [InvoiceController::class, 'paidInvoices'])->name('invoices.paid');
    Route::get('invoices/completed', [InvoiceController::class, 'completedInvoices'])->name('invoices.completed');
    Route::get('invoices/overdue', [InvoiceController::class, 'overdueInvoices'])->name('invoices.overdue');
    Route::get('/pdf/{invoice}/invoice', DownloadInvoiceController::class)->name('invoices.pdf');


    ##.......................................................Checkout Routes
    Route::get('/checkout', [CheckoutController::class, 'showCheckoutForm'])->name('checkout.form');
    Route::post('/checkout', [CheckoutController::class, 'processCheckout'])->name('checkout.process');
    Route::post('/checkout/success', [CheckoutController::class, 'checkoutSuccess'])->name('checkout.success');
    Route::get('/checkout/failure', [CheckoutController::class, 'checkoutFailure'])->name('checkout.failure');

    ##.......................................................Settings Routes
    Route::resource('setting', MerchantSettings::class);
});
