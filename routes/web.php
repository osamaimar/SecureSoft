<?php

use App\Http\Controllers\CollectionController;
use App\Http\Controllers\DeviceController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PurchaseHistoryController;
use App\Http\Controllers\RegionController;
use App\Http\Controllers\SupplierController;
use App\Models\Region;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('user.dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/merchant/dashboard', function () {
    return view('merchant.dashboard');
})->middleware(['auth:merchant'])->name('merchant.dashboard');

Route::get('/admin/dashboard', function () {
    return view('admin.dashboard');
})->middleware(['auth:admin'])->name('admin.dashboard');





Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
Route::middleware('auth:merchant')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
Route::middleware('auth:admin')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


##.............................................................................................Products Routes
Route::middleware('auth:admin')->resource('products',ProductController::class);

##.............................................................................................Collections Routes
Route::middleware('auth:admin')->resource('collections',CollectionController::class);


##.............................................................................................Suppliers Routes
Route::middleware('auth:admin')->resource('suppliers',SupplierController::class);

##.............................................................................................Regions Routes
Route::middleware('auth:admin')->resource('regions',RegionController::class);


##.............................................................................................Device Routes
Route::middleware('auth:admin')->resource('devices',DeviceController::class);


##.............................................................................................Device Routes
Route::middleware('auth:admin')->resource('purchases',PurchaseHistoryController::class);




require __DIR__.'/auth.php';
