<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
//Home

Route::get('/dashboard', [HomeController::class, 'dashboard'])->middleware(['auth', 'verified'])->name('dashboard');
//Profile Change All
Route::get('/profile/user', [HomeController::class, 'profile'])->middleware(['auth', 'verified'])->name('profile.name');
Route::POST('/profile/name', [HomeController::class, 'profile_name_update'])->middleware(['auth', 'verified'])->name('name.update');
Route::POST('/Update/password', [HomeController::class, 'Update_password'])->middleware(['auth', 'verified'])->name('update.pass');
Route::POST('/profile/image', [HomeController::class, 'Update_image'])->middleware(['auth', 'verified'])->name('profile.image');

//Category Add
Route::get('/category', [CategoryController::class, 'Category'])->middleware(['auth', 'verified'])->name('category');
Route::post('/category/store', [CategoryController::class, 'Category_store'])->middleware(['auth', 'verified'])->name('category.store');
Route::get('/category/view', [CategoryController::class, 'Category_view'])->middleware(['auth', 'verified'])->name('category.view');
Route::get('/category/delete/{cate_id}', [CategoryController::class, 'Category_delete'])->middleware(['auth', 'verified'])->name('category.delete');
//product Add
Route::get('/Add_product', [ProductController::class, 'Add_product'])->middleware(['auth', 'verified'])->name('Add.product');
Route::post('/product_store', [ProductController::class, 'Product_store'])->middleware(['auth', 'verified'])->name('product.store');
Route::get('/product_view', [ProductController::class, 'Product_view'])->middleware(['auth', 'verified'])->name('product.view');
