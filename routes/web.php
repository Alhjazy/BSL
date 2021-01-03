<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
//
//Route::get('/', function () {
//    return view('welcome');
//});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::group(['prefix' => 'sales', 'middleware' => ['auth']], function(){
    Route::get('/', [App\Http\Controllers\SalesController::class, 'index']);
    Route::get('/orders', [App\Http\Controllers\SalesController::class, 'orders']);
    Route::get('/orders/list', [App\Http\Controllers\SalesController::class, 'orders_list']);
    Route::get('/orders/create', [App\Http\Controllers\SalesController::class, 'create']);
    Route::post('/orders/create', [App\Http\Controllers\SalesController::class, 'store']);
    Route::get('/orders/{id}/show', [App\Http\Controllers\SalesController::class, 'show']);
    Route::get('/orders/{id}/items', [App\Http\Controllers\SalesController::class, 'order_items']);
    Route::get('/items/{id}', [App\Http\Controllers\SalesController::class, 'sidebar_menu_items']);
});
Route::group(['prefix' => 'purchase', 'middleware' => ['auth']], function(){
    Route::get('/', [App\Http\Controllers\PurchaseController::class, 'index']);
    Route::get('/orders', [App\Http\Controllers\PurchaseController::class, 'orders']);
    Route::get('/orders/list', [App\Http\Controllers\PurchaseController::class, 'orders_list']);
    Route::get('/orders/create', [App\Http\Controllers\PurchaseController::class, 'create']);
    Route::post('/orders/create', [App\Http\Controllers\PurchaseController::class, 'store']);
    Route::get('/orders/{id}/show', [App\Http\Controllers\PurchaseController::class, 'show']);
    Route::get('/orders/{id}/items', [App\Http\Controllers\PurchaseController::class, 'order_items']);
    Route::get('/items/{id}', [App\Http\Controllers\PurchaseController::class, 'sidebar_menu_items']);
});
Route::group(['prefix' => 'customers', 'middleware' => ['auth']], function(){
    Route::get('/', [App\Http\Controllers\SalesController::class, 'index']);
    Route::post('/register', [App\Http\Controllers\SalesController::class, 'customer_store']);
    Route::get('/list', [App\Http\Controllers\SalesController::class, 'customer_list_json']);
});
Route::group(['prefix' => 'suppliers', 'middleware' => ['auth']], function(){
    Route::get('/', [App\Http\Controllers\InventoryController::class, 'index']);
    Route::post('/register', [App\Http\Controllers\InventoryController::class, 'supplier_store']);
    Route::get('/list', [App\Http\Controllers\InventoryController::class, 'supplier_list_json']);
});
Route::group(['prefix' => 'inventory', 'middleware' => ['auth']], function(){
//    Route::get('/', function () {
//        return view('hrms.dashboard');
//    });
    Route::get('/products', [App\Http\Controllers\InventoryController::class, 'index']);
    Route::get('/products/{id}/find', [App\Http\Controllers\InventoryController::class, 'product_find']);
    Route::get('/products/register', [App\Http\Controllers\InventoryController::class, 'product_create']);
    Route::post('/products/register', [App\Http\Controllers\InventoryController::class, 'product_store']);
    Route::put('/products/{id}/edit', [App\Http\Controllers\InventoryController::class, 'product_update']);
    Route::get('/products/{id}/edit', [App\Http\Controllers\InventoryController::class, 'product_edit']);
    Route::get('/products/{id}/show', [App\Http\Controllers\InventoryController::class, 'product_show']);
    Route::delete('/products/{id}/images/delete', [App\Http\Controllers\InventoryController::class, 'product_images_delete']);
    Route::get('/products/categories', [App\Http\Controllers\InventoryController::class, 'index']);
    Route::post('/products/categories/register', [App\Http\Controllers\InventoryController::class, 'product_category_register']);
});

Route::group(['prefix' => 'hrms', 'middleware' => ['auth']], function(){
    Route::get('/', function () {
        return view('hrms.dashboard');
    });
    Route::get('/employee', [App\Http\Controllers\EmployeeController::class, 'index']);
    Route::get('/employee/register', [App\Http\Controllers\EmployeeController::class, 'create']);
    Route::get('/employee/{id}/profile', [App\Http\Controllers\EmployeeController::class, 'show']);
    Route::post('/employee/register', [App\Http\Controllers\EmployeeController::class, 'store']);
});
Route::group(['prefix' => 'settings', 'middleware' => ['auth']], function(){
    Route::get('/', [App\Http\Controllers\SettingsController::class, 'index']);
    Route::get('/companyinfo', [App\Http\Controllers\SettingsController::class, 'company_info']);
    Route::post('/companyinfo/edit', [App\Http\Controllers\SettingsController::class, 'company_info_edit']);
    Route::get('/departments', [App\Http\Controllers\SettingsController::class, 'departments']);
    Route::get('/branchs', [App\Http\Controllers\SettingsController::class, 'branchs']);
});
Route::group(['domain' => 'pos.laravel.or', 'middleware' => ['auth']], function () {
    // Backend routes
    Route::group(['middleware' => 'auth'], function () {
        Route::get('/', [App\Http\Controllers\PosController::class, 'index']);
        Route::get('/products/{id}/find', [App\Http\Controllers\PosController::class, 'get_product_json']);
        Route::post('/store', [App\Http\Controllers\PosController::class, 'store']);
        Route::get('/invoice', [App\Http\Controllers\PosController::class, 'pos_invoice']);
    });
});

