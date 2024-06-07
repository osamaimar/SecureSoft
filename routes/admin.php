<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\Auth\NewPasswordController;
use App\Http\Controllers\CollectionController;
use App\Http\Controllers\DeviceController;
use App\Http\Controllers\InvoiceController;
use App\Http\Controllers\LicenseController;
use App\Http\Controllers\MerchantController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PurchaseHistoryController;
use App\Http\Controllers\RegionController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\SettingsController;
use App\Http\Controllers\SupplierController;
use App\Http\Controllers\UserController;
use App\Models\Region;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;


Route::middleware('auth:admin')->name('admin.')->group(function () {
    Route::get('/admin/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    ##.......................................................Users Routes
    Route::resource('users', UserController::class);
    Route::patch('user/password', [UserController::class, 'userChangePassword'])->name('user.password.update');
    Route::put('/user/{user}/bock', [UserController::class, 'block'])->name('users.block');
    Route::put('/user/{user}/activate', [UserController::class, 'activate'])->name('users.activate');
    Route::post('/users/search', [UserController::class, 'search'])->name('users.search');

    ##.......................................................Merchants Routes
    Route::resource('merchants', MerchantController::class);
    Route::patch('merchant/password', [MerchantController::class, 'merchantChangePassword'])->name('merchant.password.update');
    Route::put('/merchant/{merchant}/bock', [MerchantController::class, 'block'])->name('merchants.block');
    Route::put('/merchant/{merchant}/activate', [MerchantController::class, 'activate'])->name('merchants.activate');
    Route::post('/merchants/search', [MerchantController::class, 'search'])->name('merchants.search');

    ##.......................................................Admins Routes
    Route::resource('admins', AdminController::class);
    Route::patch('admin/password', [AdminController::class, 'adminChangePassword'])->name('admin.password.update');
    Route::put('/admin/{admin}/bock', [AdminController::class, 'block'])->name('admins.block');
    Route::put('/admin/{admin}/activate', [AdminController::class, 'activate'])->name('admins.activate');


    ##.......................................................Products Routes
    Route::resource('products', ProductController::class);
    Route::post('/products/search', [ProductController::class, 'search'])->name('products.search');
    Route::get('/all/sortPrice', [ProductController::class, 'sortEndPrice'])->name('products.sortEndPrice');
    Route::get('/all/sortBasePrice', [ProductController::class, 'sortBasePrice'])->name('products.sortBasePrice');




    ##.......................................................Collections Routes
    Route::resource('collections', CollectionController::class);


    ##.......................................................Suppliers Routes
    Route::resource('suppliers', SupplierController::class);

    ##.......................................................Regions Routes
    Route::resource('regions', RegionController::class);


    ##.......................................................Device Routes--------------
    Route::resource('devices', DeviceController::class);


    ##.......................................................Purchase Routes
    Route::resource('purchases', PurchaseHistoryController::class);



    ##.............................................................................................Settings Routes
    Route::resource('settings', SettingsController::class);



    ##.............................................................................................Pages Routes
    Route::resource('pages', PageController::class);



    ##.............................................................................................Invoices Routes
    Route::resource('invoices', InvoiceController::class);


    ##.............................................................................................Roles Routes
    Route::resource('roles', RoleController::class);
    Route::get('/role/{admin}/add', [AdminController::class, 'editRole'])->name('roles.editRole');
    Route::post('/role/{admin}/add', [AdminController::class, 'addRole'])->name('roles.addRole');

    Route::get('/permission/{admin}/add', [AdminController::class, 'editPermission'])->name('permisisons.editPermission');
    Route::post('/permission/{admin}/add', [AdminController::class, 'addPermission'])->name('permissions.addPermission');

    ##............................................................................................Import/Export Routes
    Route::post('export/products', [ProductController::class, 'export'])->name('products.export');
    Route::post('import/products', [ProductController::class, 'import'])->name('products.import');
    Route::post('export/collections', [CollectionController::class, 'export'])->name('collections.export');
    Route::post('import/collections', [CollectionController::class, 'import'])->name('collections.import');
    Route::post('export/purchases', [PurchaseHistoryController::class, 'export'])->name('purchases.export');



    ##.......................................................License Routes
    Route::resource('licenses', LicenseController::class);
    Route::post('licenses/export/', [LicenseController::class, 'export'])->name('licenses.export');
    Route::put('licen/import', [LicenseController::class, 'import'])->name('licenses.import');
});
