<?php

namespace App\Livewire;

use App\Models\Products;
use App\Models\OrderItem;
use App\Models\Orders; // Your model for orders
use Livewire\Attributes\Layout;
use Livewire\Component;
use Razorpay\Api\Api;
use Razorpay\Api\Errors\SignatureVerificationError;


#[Layout('layouts.app')]
class Checkout extends Component
{
    public $cart, $total_price, $cart_products, $message;
    public $full_name, $email, $contact, $city, $state, $zip_code, $address;
    public $razorpayOrderId;

    public function mount()
    {
        $this->cart = cart()->getCart();

        if (!empty($this->cart)) {
            $productIds = collect($this->cart)->pluck('product_id')->toArray();
            $products = Products::whereIn('id', $productIds)->get();

            $this->cart_products = $products->map(function ($product) {
                // Find matching cart item
                $cartItem = collect($this->cart)->firstWhere('product_id', $product->id);

                $quantity = isset($cartItem['quantity']) ? (int) $cartItem['quantity'] : 1;
                $total = $product->price * $quantity;

                $product->quantity = $quantity;
                $product->getProductTotalPrice = $total;

                return $product;
            });

        } else {
            $this->message = "Product not available in cart!";
        }

        $this->total_price = cart()->getCartTotal();

    }


    public function checkout()
    {
        $api = new Api(env('RAZORPAY_KEY'), env('RAZORPAY_SECRET'));
        $orderData = [
            'receipt' => 'rcptid_' . time(),
            'amount' => (int)$this->total_price * 100, // Amount in paise
            'currency' => 'INR'
        ];
        $razorpayOrder = $api->order->create($orderData);
        $this->razorpayOrderId = $razorpayOrder['id'];

        $this->dispatch(
            'initRazorpay',
            order_id: $this->razorpayOrderId,
            amount: $orderData['amount'],
            name: $this->full_name,
            email: $this->email,
            contact: $this->contact
        );
    }

    public function paymentSuccess($razorpay_order_id,$razorpay_payment_id,$razorpay_signature)
    {
        $api = new Api(env('RAZORPAY_KEY'), env('RAZORPAY_SECRET'));

        $attributes = [
            'razorpay_order_id' => $razorpay_order_id,
            'razorpay_payment_id' => $razorpay_payment_id,
            'razorpay_signature' => $razorpay_signature,
        ];

        try {
            $api->utility->verifyPaymentSignature($attributes);

            // Signature verified, proceed to save order
            $order = new Orders;
            $order->order_id      = $razorpay_order_id ?? null;
            $order->payment_id    = $razorpay_payment_id ?? null;
            $order->signature     = $razorpay_signature ?? null;
            $order->full_name     = $this->full_name;
            $order->email         = $this->email;
            $order->contact       = $this->contact;
            $order->city          = $this->city;
            $order->state         = $this->state;
            $order->zip_code      = $this->zip_code;
            $order->address       = $this->address;
            $order->amount        = $this->total_price;
            $order->status        = 'success';
            $order->save();

            // Save products in order_items table
            foreach ($this->cart_products as $product) {

                dd($product);

                OrderItem::create([
                    'order_id'     => $order->id,
                    'product_id'   => $product->id,
                    'product_name' => $product->productname,
                    'quantity'     => (int) ($product->quantity ?? 1),
                    'price'        => (float) ($product->price ?? 0),
                    'total'        => (float) ($product->getProductTotalPrice ?? 0),
                    'created_at'   => now(),
                    'updated_at'   => now(),
                ]);
            }


            cart()->clearCart(); // Optionally clear cart
            session()->flash('message', 'Payment Success! Order placed.');
            return redirect()->route('dashboard');

        } catch (SignatureVerificationError $e) {
            session()->flash('error', 'Payment verification failed: ' . $e->getMessage());
            return redirect()->route('checkout');
        }
    }

    public function paymentFailed(...$args)
    {
        session()->flash('error', 'Payment Failed: ' . ($error['description'] ?? 'Unknown error'));
        $this->reset(['full_name', 'email', 'contact', 'city', 'state', 'zip_code', 'address']);
    }

    public function getListeners()
    {
        return [
            'paymentSuccess',
            'paymentFailed',
        ];
    }

    public function render()
    {
        return view('livewire.checkout');
    }
}
