<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\BrandController;

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

//==================================== Home routes ================================================//
Route::get("/", [HomeController::class, "index"])->name("home");
Route::get("/product/detail/{id}", [HomeController::class, "detail"])->name("product.detail");

//==================================== Category routes ================================================//
Route::get("/category/add", [CategoryController::class, "addCategory"])->name("add.category");
Route::get("/category/manage", [CategoryController::class, "manageCategory"])->name("manage.category");
Route::post("/category/create", [CategoryController::class, "createCategory"])->name("create.category");
Route::get("/category/edit/{id}", [CategoryController::class, "editCategory"])->name("edit.category");
Route::put("/category/update/{id}", [CategoryController::class, "updateCategory"])->name("update.category");
Route::get("/category/delete/{id}", [CategoryController::class, "deleteCategory"])->name("delete.category");

//==================================== Brand routes ================================================//
Route::get("/brand/add", [BrandController::class, "addBrand"])->name("add.brand");
Route::get("/brand/manage", [BrandController::class, "manageBrand"])->name("manage.brand");
Route::post("/brand/create", [BrandController::class, "createBrand"])->name("create.brand");
Route::get("/brand/edit/{id}", [BrandController::class, "editBrand"])->name("edit.brand");
Route::put("/brand/update/{id}", [BrandController::class, "updateBrand"])->name("update.brand");
Route::get("/brand/delete/{id}", [BrandController::class, "deleteBrand"])->name("delete.brand");

//==================================== Product routes ================================================//
Route::get("/product/add", [ProductController::class, "addProduct"])->name("add.product");
Route::get("/product/manage", [ProductController::class, "manageProduct"])->name("manage.product");
Route::post("/product/create", [ProductController::class, "createProduct"])->name("create.product");
Route::get("/product/edit/{id}", [ProductController::class, "editProduct"])->name("edit.product");
Route::put("/product/update/{id}", [ProductController::class, "updateProduct"])->name("update.product");
Route::get("/product/delete/{id}", [ProductController::class, "deleteProduct"])->name("delete.product");
