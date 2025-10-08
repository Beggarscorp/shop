<?php

namespace App\Livewire\Admin;

use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Layout;
use Livewire\Component;

class Admin extends Component
{
    public $totalOrders;
    public $totalProducts;
    public $totalCategories;
    public $totalCustomers;
    public $recentOrders;
    public $recentProducts;

    public function mount()
    {
        // $this->totalOrders = \App\Models\Order::count();
        $this->totalProducts = \App\Models\Products::count();
        $this->totalCategories = \App\Models\Categories::count();
        $this->totalCustomers = \App\Models\User::where('role','customer')->count();

        // $this->recentOrders = \App\Models\Order::latest()->take(5)->get();
        $this->recentProducts = \App\Models\Products::latest()->take(5)->get();
    }
    public function logout()
    {
        Auth::logout();
        return redirect()->route('auth.login')->with('error','User logged out successfully');
    }
    
    #[Layout('layouts.admin')]
    public function render()
    {
        return view('livewire.admin.admin');
    }
}
