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
