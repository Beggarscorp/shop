<?php

use App\Models\User;
use App\Livewire\Cart;
use App\Livewire\Checkout;
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
use App\Livewire\Auth\ForgotPassword;
use App\Livewire\Auth\ResetPassword;


use App\Http\Middleware\Checkrole;
use App\Livewire\ProductDetails;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

// Handle email verification link
Route::get('/email/verify/{id}/{hash}', function ($id, $hash, Request $request) {
    $user = User::findOrFail($id);

    // Validate the hash for extra security
    if (! hash_equals((string) $hash, sha1($user->getEmailForVerification()))) {
        abort(403, 'Invalid verification link.');
    }

    if (! $user->hasVerifiedEmail()) {
        $user->markEmailAsVerified();
        Auth::login($user); // log the user in after verification
    }

    return redirect('/dashboard')->with('success', 'Your email has been verified!');
})->middleware(['signed'])->name('verification.verify');

Route::middleware('auth')->group(function () {
    // Show verify email page
    Route::get('/email/verify', fn () => view('auth.verify-email'))
        ->name('verification.notice');


    // Resend verification link
    Route::post('/email/verification-notification', function (Request $request) {
        $request->user()->sendEmailVerificationNotification();
        return back()->with('message', 'Verification link sent!');
    })->middleware(['throttle:6,1'])->name('verification.send');

    // Protected dashboard route
    Route::get('/dashboard', Dashboard::class)
        ->middleware('verified')
        ->name('dashboard');
});


Route::get('/', Index::class)->name('home');
Route::get('shop', Shop::class)->name('shop');
Route::get('shop/{slug}/{categoryid}', Shop::class)->name('shop.category');
Route::get('product-details/{id}',ProductDetails::class)->name('product-details');
Route::get('products-cart',Cart::class)->name("products-cart");


// pages


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
    
    Route::get('dashboard', Dashboard::class)->name('dashboard');
    Route::get('checkout',Checkout::class)->name('checkout');

});


// auth routes
Route::get('login',Login::class)->name('login');
Route::get('signup',Signup::class)->name('signup');
Route::get('forgot-password',ForgotPassword::class)->name('forgot.password');
Route::get('reset-password/{token}',ResetPassword::class)->name('password.reset');