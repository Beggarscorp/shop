<?php

namespace App\Livewire;

use App\Models\Products;
use App\Models\Orders; // Your model for orders
use Livewire\Attributes\Layout;
use Livewire\Component;
use Razorpay\Api\Api;
use Illuminate\Support\Facades\Http;

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
                $product->quantity = cart()->getProductQuantity($product->id);
                $product->getProductTotalPrice = cart()->getProductTotalPrice($product->id);
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

    public function paymentSuccess($response)
    {
        // It's recommended to also verify the payment signature here per Razorpay docs.

        $order = new Orders;
        $order->order_id      = $response['razorpay_order_id'] ?? null;
        $order->payment_id    = $response['razorpay_payment_id'] ?? null;
        $order->signature     = $response['razorpay_signature'] ?? null;
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

        cart()->clearCart(); // Optionally clear cart
        session()->flash('message', 'Payment Success! Order placed.');
        return redirect()->route('thankyou');
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
