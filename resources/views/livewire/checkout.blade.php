<div>

    <div class="container mx-auto py-10">
        <div class="text-3xl text-yellow-700 font-semibold">Checkout</div>

        <div class="text2xl text-yellow-700 font-semibold my-5">Shopping Information</div>

        <div class="grid grid-cols-12">

            <div class="col-span-6 bg-white p-8 border-r-1 border-gray-300 ">

                <form action="">
        
                    <div class="pb-5">
                        <label for="full_name">Full name</label><br>
                        <input type="text" id="full_name" class="input_field" placeholder="Enter full name here...">
                    </div>
        
                    <div class="pb-5">
                        <label for="email">Email</label><br>
                        <input type="email" id="email" class="input_field" placeholder="Enter your email here...">
                    </div>
        
                    <div class="pb-5">
                        <label for="contact">Contact</label><br>
                        <input type="number" name="number" class="input_field" id="contact" placeholder="Enter you contact number here...">
                    </div>
        
                    <div class="pb-5 grid grid-cols-3 gap-5">
        
                        <div class="">
                            <label for="city">City</label><br>
                            <input type="text" name="city" class="input_field w-full" id="city" placeholder="Enter your city here...">
                        </div>
        
                        <div class="">
                            <label for="state">State</label><br>
                            <input type="text" name="state" class="input_field w-full" id="state" placeholder="Enter your state here...">
                        </div>
        
                        <div class="">
                            <label for="ZIP Code">ZIP Code</label><br>
                            <input type="text" name="ZIP Code" class="input_field w-full" id="ZIP Code" placeholder="Enter your ZIP Code here...">
                        </div>
        
                    </div>
        
                    <div class="pb-5">
                        <label for="address">Address</label><br>
                        <textarea name="address" id="address" class="input_field" placeholder="Enter your address here..."></textarea>
                    </div>
        
                </form>

            </div>

            <div class="col-span-6 bg-white p-8">
                <div class="flex items-center">
                    <div>
                        <div class="text2xl text-yellow-700 font-semibold my-5">Review your cart</div>
                        @foreach ($cart_products as $cartitem)

                            <div class="pb-3">
                                <div class="grid grid-cols-12 gap-3 shadow p-3">
                                    <div class="col-span-2">
                                        <img src="{{ Storage::url($cartitem->productimage) }}" alt="product-image" class="rounded">
                                    </div>
                                    <div class="col-span-10 text-gray-500">
                                        <div class="text-yellow-600">{{ $cartitem->productname }}</div>
                                        <div class="text-sm py-2">{{ $cartitem->quantity }}x</div>
                                        <div class="flex items-center">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" viewBox="0 0 24 24"><path fill="oklch(55.1% 0.027 264.364)" d="M17 6V4H6v2h3.5c1.302 0 2.401.838 2.815 2H6v2h6.315A2.994 2.994 0 0 1 9.5 12H6v2.414L11.586 20h2.828l-6-6H9.5a5.007 5.007 0 0 0 4.898-4H17V8h-2.602a4.933 4.933 0 0 0-.924-2H17z"></path></svg>
                                            {{ $cartitem->getProductTotalPrice }}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        
                        @endforeach

                        <!-- price section  -->

                        <div class="p-2 font-semibold space-y-3">

                            <div class="flex items-center justify-between">
                                <div class="text-gray-500">Subtotal</div>
                                <div class="flex items-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" viewBox="0 0 24 24"><path d="M17 6V4H6v2h3.5c1.302 0 2.401.838 2.815 2H6v2h6.315A2.994 2.994 0 0 1 9.5 12H6v2.414L11.586 20h2.828l-6-6H9.5a5.007 5.007 0 0 0 4.898-4H17V8h-2.602a4.933 4.933 0 0 0-.924-2H17z"></path></svg>
                                    <div>{{ $total_price }}</div>
                                </div>
                            </div>

                            <div class="flex items-center justify-between">
                                <div class="text-gray-500">Shipping</div>
                                <div class="flex items-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" viewBox="0 0 24 24"><path d="M17 6V4H6v2h3.5c1.302 0 2.401.838 2.815 2H6v2h6.315A2.994 2.994 0 0 1 9.5 12H6v2.414L11.586 20h2.828l-6-6H9.5a5.007 5.007 0 0 0 4.898-4H17V8h-2.602a4.933 4.933 0 0 0-.924-2H17z"></path></svg>
                                    <div><span class="line-through">100.00</span> 00 </div>
                                </div>
                            </div>

                            <div class="flex items-center justify-between py-3">
                                <div>Total</div>
                                <div class="flex items-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" viewBox="0 0 24 24"><path d="M17 6V4H6v2h3.5c1.302 0 2.401.838 2.815 2H6v2h6.315A2.994 2.994 0 0 1 9.5 12H6v2.414L11.586 20h2.828l-6-6H9.5a5.007 5.007 0 0 0 4.898-4H17V8h-2.602a4.933 4.933 0 0 0-.924-2H17z"></path></svg>
                                    <div>{{ $total_price }}</div>
                                </div>
                            </div>

                            <button class="bg-yellow-700 text-center text-white w-full py-1 rounded">Pay Now</button>

                        </div>

                    </div>
                </div>
            </div>
        </div>


    </div>

</div>
