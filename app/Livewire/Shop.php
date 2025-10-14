<?php

namespace App\Livewire;

use Livewire\Attributes\Layout;
use Livewire\Component;
use App\Models\Products;

#[Layout('layouts.app')]
class Shop extends Component
{
    public $products;
    public $message;
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
    public function hydrate()
{
    $this->mount(); // re-fetch products on SPA navigation
}

    public function addtocart($productid)
    {
        addToCart($productid);
        $this->dispatch('cartUpdated');
        $this->dispatch('show-toast', message: 'Product added to cart successfully!');
    }

    public function render()
    {
        return view('livewire.shop');
    }
}
