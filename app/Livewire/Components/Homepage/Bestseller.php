<?php

namespace App\Livewire\Components\Homepage;

use Livewire\Component;
use App\Models\Products;

class Bestseller extends Component
{
    public $bestseller;
    public function mount()
    {
        $this->bestseller = Products::where('category_id',2)->get();
    }
    public function render()
    {
        return view('livewire.components.homepage.bestseller');
    }
}
