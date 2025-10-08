<?php

namespace App\Livewire\Components;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Adminsidebar extends Component
{
    public function logout()
    {
        Auth::logout();
        return redirect()->route('auth.login')->with('success','Admin logged out successfully');
    }
    public function render()
    {
        return view('livewire.components.adminsidebar');
    }
}
