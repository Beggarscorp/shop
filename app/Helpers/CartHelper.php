<?php

use Illuminate\Support\Facades\Session;
use App\Models\Products;

// ------------------------------
// CART SESSION HELPERS
// ------------------------------

if (!function_exists('getCart')) {
    function getCart(): array
    {
        return Session::get('cart', []);
    }
}

if (!function_exists('saveCart')) {
    function saveCart(array $cart): void
    {
        Session::put('cart', $cart);
        Session::save(); // Ensure Livewire sees the latest session
    }
}

if (!function_exists('clearCart')) {
    function clearCart(): void
    {
        Session::forget('cart');
        Session::save();
    }
}

// ------------------------------
// CART ACTIONS
// ------------------------------

if (!function_exists('addToCart')) {
    function addToCart(int $productId, int $quantity = 1): void
    {
        $cart = getCart();

        if (isset($cart[$productId])) {
            $cart[$productId]['quantity'] += $quantity;
        } else {
            $cart[$productId] = [
                'product_id' => $productId,
                'quantity' => $quantity,
            ];
        }

        saveCart($cart);
    }
}

if (!function_exists('removeFromCart')) {
    function removeFromCart(int $productId): void
    {
        $cart = getCart();

        if (isset($cart[$productId])) {
            unset($cart[$productId]);
        }

        if (empty($cart)) {
            clearCart();
        } else {
            saveCart($cart);
        }
    }
}

if (!function_exists('increaseQuantity')) {
    function increaseQuantity(int $productId): void
    {
        $cart = getCart();
        if (isset($cart[$productId])) {
            $cart[$productId]['quantity']++;
            saveCart($cart);
        }
    }
}

if (!function_exists('decreaseQuantity')) {
    function decreaseQuantity(int $productId): void
    {
        $cart = getCart();
        if (isset($cart[$productId])) {
            $cart[$productId]['quantity']--;

            if ($cart[$productId]['quantity'] <= 0) {
                unset($cart[$productId]);
            }
        }

        if (empty($cart)) {
            clearCart();
        } else {
            saveCart($cart);
        }
    }
}

// ------------------------------
// CART DATA HELPERS
// ------------------------------

if (!function_exists('getProductQuantity')) {
    function getProductQuantity(int $productId): int
    {
        $cart = getCart();
        return $cart[$productId]['quantity'] ?? 0;
    }
}

if (!function_exists('getProductTotalPrice')) {
    function getProductTotalPrice(int $productId): float
    {
        $product = Products::find($productId);
        if (!$product) return 0;

        $quantity = getProductQuantity($productId);
        $priceToUse = ($product->sale_price && $product->sale_price > 0)
            ? $product->sale_price
            : $product->price;

        return round($priceToUse * $quantity, 2);
    }
}

if (!function_exists('getCartTotal')) {
    function getCartTotal(): float
    {
        $cart = getCart();
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
