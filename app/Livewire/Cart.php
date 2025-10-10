<?php

namespace App\Livewire;

use App\Models\Products;
use Livewire\Attributes\Layout;
use Livewire\Component;

#[Layout('layouts.app')]
class Cart extends Component
{
    public $cart;
    public $cart_products=[];
    public $total_price;

    
    public function mount()
    {
        $this->cart = getCart();
        
        if (!empty($this->cart)) {
            $productIds = collect($this->cart)->pluck('product_id')->toArray();
            $products = Products::whereIn('id', $productIds)->get();

            $this->cart_products = $products->map(function ($product) {
                $product->quantity = $this->cart[$product->id]['quantity'] ?? 1;
                return $product;
            });
        }
        $this->totalPrice();
    }
    public function totalPrice()
    {
        $this->total_price = 0; // reset first

        foreach ($this->cart_products as $product) {
            $this->total_price += ($product->sale_price ?? $product->price)  * $product->quantity;
        }
    }

    public function increasequantity($productid)
    {
        increaseQuantity($productid);
        $this->mount();
    }
    
    public function decreasequantity($productid)
    {
        decreaseQuantity($productid);
        $this->mount();
    }

    public function removeproductfromcart($productid)
    {
        removeFromCart($productid);
        $this->mount();
    }
    
    public function render()
    {
        return view('livewire.cart');
    }
}
