<?php

use Illuminate\Support\Facades\Route;
use App\Livewire\Index;
use App\Livewire\Dashboard;
use App\Livewire\Admin\Admin;

use App\Livewire\Auth\Login;
use App\Livewire\Auth\Signup;

use App\Http\Middleware\Checkrole;
use Psy\VersionUpdater\Checker;

Route::get('/', Index::class)->name('home');
Route::get('/dashboard', Dashboard::class)->name('dashboard');

// admin routes
Route::middleware(Checkrole::class)->group(function () {

    Route::get('/admin', Admin::class)->name('admin');

});


// auth routes
Route::get('/login',Login::class)->name('auth.login');
Route::get('/signup',Signup::class)->name('auth.signup');