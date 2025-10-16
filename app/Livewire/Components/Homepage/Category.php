<?php

namespace App\Livewire\Components\Homepage;

use App\Models\Categories;
use Livewire\Component;

class Category extends Component
{
    public $categories;
    public function mount()
    {
        $this->categories = Categories::whereHas('categoryproducts')->get();
    }
    public function render()
    {
        return view('livewire.components.homepage.category');
    }
}
