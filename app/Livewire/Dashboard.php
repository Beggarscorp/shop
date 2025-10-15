<?php

namespace App\Livewire;

use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Layout;
use Livewire\Component;

class Dashboard extends Component
{
    public $user;
    public function mount()
    {
        if(Auth::check())
        {
            $this->user=Auth::user()->name;
        }
    }
    public function logout()
    {
        Auth::logout();
        return redirect()->route('auth.login')->with('error','User logout successfully');
    }
    #[Layout('layouts.customerdashbord')]
    public function render()
    {
        return view('livewire.dashboard',['user'=>Auth::user()?->name]);
    }
}
