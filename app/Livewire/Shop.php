<?php

namespace App\Livewire;

use Livewire\Attributes\Layout;
use Livewire\Component;
use App\Models\Products;
use App\Models\Categories;

#[Layout('layouts.app')]
class Shop extends Component
{
    public $products;
    public $message;
    public $categories;
    
    public function mount($categoryid = null)
    {
        $this->categories = Categories::whereHas('categoryproducts')->get();

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
        $this->mount();
        cart()->getCart();
    }

    public function addtocart($productid)
    {
        cart()->addToCart($productid);
        $this->dispatch('cartUpdated');
        $this->dispatch('show-toast', message: 'Product added to cart successfully!');
    }

    public function filterProducts($cateid = null)
    {
        if(!empty($cateid))
        {
            $this->products=Products::where('category_id',$cateid)->get();
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
