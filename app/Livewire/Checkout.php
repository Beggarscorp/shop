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
        $this->cart = getCart();
        
        if (!empty($this->cart)) {
            $productIds = collect($this->cart)->pluck('product_id')->toArray();
            $products = Products::whereIn('id', $productIds)->get();

            $this->cart_products = $products->map(function ($product) {
                $product->quantity = getProductQuantity($product->id);
                $product->getProductTotalPrice = getProductTotalPrice($product->id,$product->sale_price ?? $product->price);
                return $product;
            });
        }
        else
        {
            $this->message="Product not available in cart!";
        }
        $this->total_price=getCartTotal();
    }
    public function render()
    {
        return view('livewire.checkout');
    }
}
