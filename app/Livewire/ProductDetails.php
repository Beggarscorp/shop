<?php

namespace App\Livewire;

use App\Models\Products;
use Livewire\Attributes\Layout;
use Livewire\Component;

#[Layout('layouts.app')]
class ProductDetails extends Component
{
    public $product;
    public function mount($id)
    {
        $this->product=Products::findOrFail($id);
    }
    public function render()
    {
        return view('livewire.product-details');
    }
}
