<?php

namespace App\Livewire\Components;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Adminheader extends Component
{
    public function logout()
    {
        Auth::logout();
        return redirect()->route('auth.login')->with('error','Logout Successfully');
    }
    public function render()
    {
        return view('livewire.components.adminheader');
    }
}
