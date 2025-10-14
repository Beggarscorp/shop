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
    public $message;
    public $getProductTotalPrice;
    
    public function mount()
    {
        $this->cart = getCart();
        
        if (!empty($this->cart)) {
            $productIds = collect($this->cart)->pluck('product_id')->toArray();
            $products = Products::whereIn('id', $productIds)->get();

            $this->cart_products = $products->map(function ($product) {
                $product->quantity = getProductQuantity($product->id);
                $product->getProductTotalPrice = getProductTotalPrice($product->id);
                return $product;
            });
        }
        else
        {
            $this->message="Product not available in cart!";
        }
        $this->total_price=getCartTotal();
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
