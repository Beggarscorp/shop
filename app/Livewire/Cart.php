<?php
namespace App\Livewire;

use App\Models\Products;
use Livewire\Attributes\Layout;
use Livewire\Component;
use Livewire\Attributes\On;

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
    #[On('cartUpdated')]
    public function refreshCart()
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
            $this->message = null;
        } else {
            $this->cart_products = [];
            $this->message = "Product not available in cart!";
        }

        $this->total_price = cart()->getCartTotal();
    }

    // Increase quantity
    public function increasequantity($productid)
    {
        cart()->increaseQuantity($productid);
        $this->refreshCart();
    }

    // Decrease quantity
    public function decreasequantity($productid)
    {
        cart()->decreaseQuantity($productid);
        $this->refreshCart();
    }

    // Remove product
    public function removeproductfromcart($productid)
    {
        cart()->removeFromCart($productid);
        $this->refreshCart();
        $this->dispatch('cartUpdated');
        $this->dispatch('show-toast', message: 'Product removed from cart!');
    }

    public function render()
    {
        return view('livewire.cart');
    }
}
