<?php

namespace App\Services;

use Illuminate\Support\Facades\Session;
use App\Models\Products;

class CartService
{
    // ------------------------------
    // CART SESSION HELPERS
    // ------------------------------

    public function getCart(): array
    {
        return Session::get('cart', []);
    }

    public function saveCart(array $cart): void
    {
        Session::put('cart', $cart);
        Session::save();
    }

    public function clearCart(): void
    {
        Session::forget('cart');
        Session::save();
    }

    // ------------------------------
    // CART ACTIONS
    // ------------------------------

    public function addToCart(int $productId, int $quantity = 1): void
    {
        $cart = $this->getCart();

        if (isset($cart[$productId])) {
            $cart[$productId]['quantity'] += $quantity;
        } else {
            $cart[$productId] = [
                'product_id' => $productId,
                'quantity' => $quantity,
            ];
        }

        $this->saveCart($cart);
    }

    public function removeFromCart(int $productId): void
    {
        $cart = $this->getCart();

        if (isset($cart[$productId])) {
            unset($cart[$productId]);
        }

        if (empty($cart)) {
            $this->clearCart();
        } else {
            $this->saveCart($cart);
        }
    }

    public function increaseQuantity(int $productId): void
    {
        $cart = $this->getCart();
        if (isset($cart[$productId])) {
            $cart[$productId]['quantity']++;
            $this->saveCart($cart);
        }
    }

    public function decreaseQuantity(int $productId): void
    {
        $cart = $this->getCart();
        if (isset($cart[$productId])) {
            $cart[$productId]['quantity']--;

            if ($cart[$productId]['quantity'] <= 0) {
                unset($cart[$productId]);
            }
        }

        if (empty($cart)) {
            $this->clearCart();
        } else {
            $this->saveCart($cart);
        }
    }

    // ------------------------------
    // CART DATA HELPERS
    // ------------------------------

    public function getProductQuantity(int $productId): int
    {
        $cart = $this->getCart();
        return $cart[$productId]['quantity'] ?? 0;
    }

    public function getProductTotalPrice(int $productId): float
    {
        $product = Products::find($productId);
        if (!$product) return 0;

        $quantity = $this->getProductQuantity($productId);
        $priceToUse = ($product->sale_price && $product->sale_price > 0)
            ? $product->sale_price
            : $product->price;

        return round($priceToUse * $quantity, 2);
    }

    public function getCartTotal(): float
    {
        $cart = $this->getCart();
        $total = 0;

        foreach ($cart as $item) {
            $product = Products::find($item['product_id']);
            if ($product) {
                $priceToUse = ($product->sale_price && $product->sale_price > 0)
                    ? $product->sale_price
                    : $product->price;

                $total += $priceToUse * $item['quantity'];
            }
        }

        return round($total, 2);
    }
}
