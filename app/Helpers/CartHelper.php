<?php

use Illuminate\Support\Facades\Session;

if (!function_exists('getCart')) {
    function getCart() {
        return Session::get('cart', []);
    }
}

if (!function_exists('saveCart')) {
    function saveCart($cart) {
        Session::put('cart', $cart);
    }
}

if (!function_exists('addToCart')) {
    function addToCart($productId, $quantity = 1) {
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
    function removeFromCart($productId) {
        $cart = getCart();
        unset($cart[$productId]);
        saveCart($cart);
    }
}

if (!function_exists('clearCart')) {
    function clearCart() {
        Session::forget('cart');
    }
}

if (!function_exists('increaseQuantity')) {
    function increaseQuantity($productId) {
        $cart = getCart();
        if (isset($cart[$productId])) {
            $cart[$productId]['quantity']++;
            saveCart($cart);
        }
    }
}

if (!function_exists('decreaseQuantity')) {
    function decreaseQuantity($productId) {
        $cart = getCart();
        if (isset($cart[$productId])) {
            $cart[$productId]['quantity']--;
            if ($cart[$productId]['quantity'] <= 0) {
                unset($cart[$productId]);
            }
            saveCart($cart);
        }
    }
}

if (!function_exists('getCartTotal')) {
    function getCartTotal() {
        $cart = getCart();
        $total = 0;

        foreach ($cart as $item) {
            // Fetch product from database using its ID
            $product = \App\Models\Products::find($item['product_id']);
            if ($product) {
                // Use sale_price if available, otherwise use price
                $price = $product->sale_price ?? $product->price;
                $total += $price * $item['quantity'];
            }
        }

        return number_format($total, 2, '.', '');
    }
}

if (!function_exists('getProductQuantity')) {
    function getProductQuantity($productId) {
        $cart = getCart();
        return $cart[$productId]['quantity'] ?? 1;
    }
}

if (!function_exists('getProductTotalPrice')) {
    function getProductTotalPrice($productId, $price) {
        $cart = getCart();
        $quantity = $cart[$productId]['quantity'] ?? 1;

        return number_format($price * $quantity,2,'.','');
    }
}
