<?php

namespace App\Livewire;

use App\Models\Products;
use Livewire\Attributes\Layout;
use Livewire\Component;

#[Layout('layouts.app')]
class Checkout extends Component
{
    public $cart, $total_price, $cart_products, $message;
    
    public function mount()
    {
        $this->cart = cart()->getCart();
        
        if (!empty($this->cart)) {
            $productIds = collect($this->cart)->pluck('product_id')->toArray();
            $products = Products::whereIn('id', $productIds)->get();

            $this->cart_products = $products->map(function ($product) {
                $product->quantity = cart()->getProductQuantity($product->id);
                $product->getProductTotalPrice = cart()->getProductTotalPrice($product->id);
                return $product;
            });
        }
        else
        {
            $this->message="Product not available in cart!";
        }
        $this->total_price=cart()->getCartTotal();
    }
    public function render()
    {
        return view('livewire.checkout');
    }
}
