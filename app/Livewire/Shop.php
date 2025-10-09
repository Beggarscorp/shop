<?php

namespace App\Livewire;

use Livewire\Attributes\Layout;
use Livewire\Component;
use App\Models\Products;

#[Layout('layouts.app')]
class Shop extends Component
{
    public $products;
    public function mount($categoryid = null)
    {
        if(!empty($categoryid))
        {
            $this->products=Products::where('category_id',$categoryid)->get();
        }
        else
        {
            $this->products=Products::all();
        }
    }
    public function render()
    {
        return view('livewire.shop');
    }
}
