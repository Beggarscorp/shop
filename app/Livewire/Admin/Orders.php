<?php

namespace App\Livewire\Admin;

use Livewire\Attributes\Layout;
use Livewire\Component;

#[Layout('layouts.admin')]
class Orders extends Component
{
    public function render()
    {
        return view('livewire.admin.orders');
    }
}
