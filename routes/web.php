<?php

use Illuminate\Support\Facades\Route;
use App\Livewire\Index;

// Customer imports
use App\Livewire\Dashboard;
use App\Livewire\Shop;

// Admin components import
use App\Livewire\Admin\Admin;
use App\Livewire\Admin\AddProduct;
use App\Livewire\Admin\AddCategory;
use App\Livewire\Admin\EditProduct;
use App\Livewire\Admin\Categories;
use App\Livewire\Admin\Products;
use App\Livewire\Admin\Orders;
use App\Livewire\Admin\EditCategory;

use App\Livewire\Auth\Login;
use App\Livewire\Auth\Signup;

use App\Http\Middleware\Checkrole;

Route::get('/', Index::class)->name('home');
Route::get('/shop', Shop::class)->name('shop');

// admin routes
Route::middleware(Checkrole::class.':admin')->group(function () {
    
    Route::get('/admin', Admin::class)->name('admin');
    Route::get('admin/add-product',AddProduct::class)->name('admin.add-product');
    Route::get('admin/edit-product/{id}',EditProduct::class)->name('admin.edit-product');
    Route::get('admin/add-category',AddCategory::class)->name('admin.add-category');
    Route::get('admin/products',Products::class)->name('admin.products');
    Route::get('admin/categories',Categories::class)->name('admin.categories');
    Route::get('admin/edit-category/{id}',EditCategory::class)->name('admin.edit-category');
    Route::get('admin/orders',Orders::class)->name('admin.orders');
    
});

Route::middleware(Checkrole::class.':customer')->group(function () {
    
    Route::get('/dashboard', Dashboard::class)->name('dashboard');

});


// auth routes
Route::get('/login',Login::class)->name('auth.login');
Route::get('/signup',Signup::class)->name('auth.signup');