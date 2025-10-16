<?php

namespace App\Livewire\Components;

use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Title;
use Livewire\Component;

#[Title('Dashboard')]
class Customerdashboardsidebar extends Component
{
    public function logout()
    {
        Auth::logout();
        return redirect()->route('login')->with('success','User logged out successfully');
    }
    public function render()
    {
        return view('livewire.components.customerdashboardsidebar');
    }
}
