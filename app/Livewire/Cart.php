<?php
namespace App\Livewire;

use App\Models\Products;
use Livewire\Attributes\Layout;
use Livewire\Component;

#[Layout('layouts.app')]
class Cart extends Component
{
    public $cart = [];
    public $cart_products = [];
    public $total_price;
    public $message;

    public function mount()
    {
        $this->refreshCart();
    }

    // Dedicated method to refresh cart
    public function refreshCart()
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
            $this->message = null;
        } else {
            $this->cart_products = [];
            $this->message = "Product not available in cart!";
        }

        $this->total_price = getCartTotal();
    }

    // Increase quantity
    public function increasequantity($productid)
    {
        increaseQuantity($productid);
        $this->refreshCart();
    }

    // Decrease quantity
    public function decreasequantity($productid)
    {
        decreaseQuantity($productid);
        $this->refreshCart();
    }

    // Remove product
    public function removeproductfromcart($productid)
    {
        removeFromCart($productid);
        $this->refreshCart();
    }

    public function render()
    {
        return view('livewire.cart');
    }
}
