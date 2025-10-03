<?php

namespace App\Livewire\Admin;

use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Layout;
use Livewire\Component;

class Admin extends Component
{

    public function logout()
    {
        Auth::logout();
        return redirect()->route('auth.login')->with('success','You logged out successfully');
    }
    
    #[Layout('layouts.admin')]
    public function render()
    {
        return view('livewire.admin.admin',['user'=>Auth::user()?->name]);
    }
}
