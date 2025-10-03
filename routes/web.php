<?php

use Illuminate\Support\Facades\Route;
use App\Livewire\Index;
use App\Livewire\Admin\Admin;

use App\Livewire\Auth\Login;
use App\Livewire\Auth\Signup;


Route::get('/', Index::class)->name('home');

// admin routes
Route::get('/admin', Admin::class)->name('admin');

// auth routes
Route::get('/login',Login::class)->name('auth.login');
Route::get('/signup',Signup::class)->name('auth.signup');