<div>
    <div class="container mx-auto px-4 py-8 text-gray-500">
        
        <div class="grid grid-cols-12">
            
            <!-- left section where i am showing all cart products -->
            <div class="col-span-8">
                
                    @if (!empty($message))
                        <div class="text-3xl text-gray-400 p-5">{{$message}}</div>
                    @endif

                <table>
                    <thead>
                        <tr class="border-b-1 border-gray-400">
                            <td class="py-2 px-4"></td>
                            <td class="py-2 px-4">Product</td>
                            <td class="py-2 px-4">Price</td>
                            <td class="py-2 px-4">Quantity</td>
                            <td class="py-2 px-4">Subtotal</td>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($cart_products as $product)
                        <tr class="border-b-1 border-gray-400">
                            <td class="py-2 px-4 w-1/8"><img src="{{ Storage::url($product->productimage) }}" alt="product-image" class="rounded"></td>
                            <td class="py-2 px-4">{{ $product->productname }}</td>
                            <td class="py-2 px-4">{{ $product->price }}</td>
                            <td class="py-2 px-4">
                                <div class="flex space-x-5">
                                    <button wire:click="increasequantity({{ $product->id }})">
                                        <svg class="w-6 h-6 text-gray-500 dark:text-gray-500" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="15" height="15" fill="none" viewBox="0 0 24 24">
                                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 12h14m-7 7V5"/>
                                        </svg>
                                    </button>
                                    <div class="bg-yellow-500 w-20 text-center text-white rounded">{{ $product->quantity }}</div>
                                    <button wire:click="decreasequantity({{ $product->id }})">
                                        <svg class="w-6 h-6 text-gray-500 dark:text-gray-500" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="15" height="15" fill="none" viewBox="0 0 24 24">
                                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 12h14"/>
                                        </svg>
                                    </button>
                                </div>
                            </td>
                            <td class="py-2 px-4">
                                <div class="flex items-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24"><path fill="oklch(55.1% 0.027 264.364)" d="M17 6V4H6v2h3.5c1.302 0 2.401.838 2.815 2H6v2h6.315A2.994 2.994 0 0 1 9.5 12H6v2.414L11.586 20h2.828l-6-6H9.5a5.007 5.007 0 0 0 4.898-4H17V8h-2.602a4.933 4.933 0 0 0-.924-2H17z"></path></svg>
                                    {{ $product->getProductTotalPrice }}
                                </div>
                            </td>
                        </tr>
                        
                        @endforeach
                    </tbody>
                </table>
                
            </div>
            
            <!-- right section code, here i am showing price details -->
            <div class="col-span-4 px-5">
                <div class="bg-gray-200 border-1 border-gray-300 p-5 space-y-3 rounded">

                    <div class="border-b-1 border-gray-400 pb-2 text-2xl text-yellow-600 font-semibold">Cart Totals</div>
                    
                    <!-- shipping section -->
                    <div class="flex items-center justify-between py-3 text-sm">
                        <div>Shippping (Standard)</div>
                        <div class="flex items-center">
                            <span class="flex items-center line-through">
                                <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" viewBox="0 0 24 24"><path fill="oklch(55.1% 0.027 264.364)" d="M17 6V4H6v2h3.5c1.302 0 2.401.838 2.815 2H6v2h6.315A2.994 2.994 0 0 1 9.5 12H6v2.414L11.586 20h2.828l-6-6H9.5a5.007 5.007 0 0 0 4.898-4H17V8h-2.602a4.933 4.933 0 0 0-.924-2H17z"></path></svg>
                                100
                            </span>
                            <span class="pl-1">00</span>
                        </div>
                     </div>

                    <!-- Total price -->
                    <div class="flex justify-between items-center border-t-1 border-gray-400 mt-5 pt-3">
                        <div>Total</div>
                        <div class="flex items-center">
                            <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" viewBox="0 0 24 24"><path fill="oklch(55.1% 0.027 264.364)" d="M17 6V4H6v2h3.5c1.302 0 2.401.838 2.815 2H6v2h6.315A2.994 2.994 0 0 1 9.5 12H6v2.414L11.586 20h2.828l-6-6H9.5a5.007 5.007 0 0 0 4.898-4H17V8h-2.602a4.933 4.933 0 0 0-.924-2H17z"></path></svg>
                            {{ $total_price }}
                        </div>
                    </div>

                    <!-- proceed to checkout button  -->
                     <button class="w-full bg-yellow-600 text-white py-1 font-semibold mt-5">Proceed to Checkout</button>

                </div>
            </div>

        </div>
    </div>
</div>
