<?php

namespace App\Livewire;

use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Layout;
use Livewire\Component;

class Dashboard extends Component
{
    #[Layout('layouts.customerdashbord')]
    public function render()
    {
        return view('livewire.dashboard',['user'=>Auth::user()?->name]);
    }
}
