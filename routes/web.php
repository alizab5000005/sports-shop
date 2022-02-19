<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\BrandController;
use App\Http\Controllers\FrontController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CartController;
use App\Http\Middleware\IsAdmin;

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


Route::middleware([IsAdmin::class])->group(function(){
    Route::get('/admin_panel/dashboard', function () {
        return view('admin_panel.dashboard');
    });

    Route::get('/admin_panel/categories/view_all_categories', [CategoryController::class, 'index']);
    Route::get('/admin_panel/categories/add_category', [CategoryController::class, 'create']);
    Route::post('/admin_panel/categories/store_category', [CategoryController::class, 'store']);
    Route::get('/admin_panel/categories/edit_category/{id}', [CategoryController::class, 'edit']);
    Route::post('/admin_panel/categories/update_category/{id}', [CategoryController::class, 'update']);
    Route::get('/admin_panel/categories/delete_category/{id}', [CategoryController::class, 'delete']);
    Route::get('/admin_panel/categories/deactivate_category/{id}', [CategoryController::class, 'deactivate']);
    Route::get('/admin_panel/categories/activate_category/{id}', [CategoryController::class, 'activate']);


    Route::get('/admin_panel/brands/view_all_brands', [BrandController::class, 'index']);
    Route::get('/admin_panel/brands/add_brand', [BrandController::class, 'create']);
    Route::post('/admin_panel/brands/store_brand', [BrandController::class, 'store']);
    Route::get('/admin_panel/brands/edit_brand/{id}', [BrandController::class, 'edit']);
    Route::post('/admin_panel/brands/update_brand/{id}', [BrandController::class, 'update']);
    Route::get('/admin_panel/brands/delete_brand/{id}', [BrandController::class, 'delete']);
    Route::get('/admin_panel/brands/deactivate_brand/{id}', [BrandController::class, 'deactivate']);
    Route::get('/admin_panel/brands/activate_brand/{id}', [BrandController::class, 'activate']);


    Route::get('/admin_panel/products/view_all_products', [ProductController::class, 'index']);
    Route::get('/admin_panel/products/add_product', [ProductController::class, 'create']);
    Route::post('/admin_panel/products/store_product', [ProductController::class, 'store']);
    Route::get('/admin_panel/products/edit_product/{id}', [ProductController::class, 'edit']);
    Route::post('/admin_panel/products/update_product/{id}', [ProductController::class, 'update']);
    Route::get('/admin_panel/products/delete_product/{id}', [ProductController::class, 'delete']);
    Route::get('/admin_panel/products/deactivate_product/{id}', [ProductController::class, 'deactivate']);
    Route::get('/admin_panel/products/activate_product/{id}', [ProductController::class, 'activate']);
    
    
    
    Route::get('/admin_panel/customers/view_all_customers',[UserController::class,'index']);
    Route::get('/admin_panel/customers/delete_customer/{id}', [UserController::class, 'delete']);
    Route::get('/admin_panel/customers/deactivate_customer/{id}', [UserController::class, 'deactivate']);
    Route::get('/admin_panel/customers/activate_customer/{id}', [UserController::class, 'activate']);
    
});

Auth::routes();

Route::get('/',[FrontController::class,'index']);
Route::get('/category_items/{id}',[FrontController::class,'category_items']);
Route::get('/brand_items/{id}',[FrontController::class,'brand_items']);
Route::get('/product_details/{id}',[FrontController::class,'product_details']);
Route::post('/add_to_cart',[CartController::class,'add_to_cart']);
Route::get('/show_cart_items',[CartController::class,'show_cart_items']);
Route::get('/delete_cart_item/{id}',[CartController::class,'delete_cart_item']);
