<?php

namespace App\Livewire\Components;

use Livewire\Component;

class Header extends Component
{
    public $cartCount = 0;

    public function mount()
    {
        $this->updateCartCount();
    }

    #[\Livewire\Attributes\On('cartUpdated')]
    public function updateCartCount()
    {
        $this->cartCount = count(array_column(getCart(), 'quantity'));
        
    }

    public function render()
    {
        return view('livewire.components.header');
    }
}
