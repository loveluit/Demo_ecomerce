<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\BrandController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\Font_endController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome');
// });

//Font_End
Route::get('/', [Font_endController::class, 'Master'])->name('index.page');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
//Home

Route::get('/dashboard', [HomeController::class, 'dashboard'])->middleware(['auth', 'admin'])->name('dashboard');
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
//Add Brand
Route::get('/Add_brand', [BrandController::class, 'Add_brand'])->middleware(['auth', 'verified'])->name('Add.brand');
Route::post('/brand/store', [BrandController::class, 'Brand_store'])->middleware(['auth', 'verified'])->name('brand.store');
Route::get('/brand/view', [BrandController::class, 'Brand_view'])->middleware(['auth', 'verified'])->name('brand.view');
Route::get('/brand/delete/{brand_id}', [BrandController::class, 'Brand_del'])->middleware(['auth', 'verified'])->name('brand.del');
//Admin User
Route::get('/admin/user', [AdminController::class, 'Admin_user'])->middleware(['auth', 'verified'])->name('admin.user');
Route::get('/admin/usertype/{user_id}', [AdminController::class, 'Admin_usertype'])->middleware(['auth', 'verified'])->name('admin.usertype');
//Font_end
Route::get('/shop', [Font_endController::class, 'Shop'])->name('font.shop');
Route::get('/cart', [Font_endController::class, 'Cart'])->name('font.cart');
Route::get('/about', [Font_endController::class, 'About'])->name('font.about');
Route::get('/contact', [Font_endController::class, 'Contact'])->name('font.contact');
Route::get('/wishlist', [Font_endController::class, 'wishlist'])->name('font.wishlist');
Route::get('/products/details/{id}', [Font_endController::class, 'details'])->name('products.detail');
//Add to cart
// Route::post('/add-to-cart/{id}', [ProductController::class, 'addToCart'])->name('cart.add');
Route::post('/add-to-cart/{id}', [ProductController::class, 'addToCart'])->name('cart.add');
