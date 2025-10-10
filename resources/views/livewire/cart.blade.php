<div>
    <div class="container mx-auto p-4 text-gray-500">

        <!-- <div class="text-5xl text-gray-400 p-5">Shopping Bag</div> -->

        <div class="grid grid-cols-12">

            <!-- left section where i am showing all cart products -->
            <div class="col-span-8">

                @foreach ($cart_products as $product)
                
                    <div class="grid grid-cols-12 gap-10 p-5 shadow-lg rounded-lg">
                        <div class="col-span-4"><img src="{{ Storage::url($product->productimage) }}" alt="product-image" class="rounded"></div>
                        <div class="col-span-8 py-3 space-y-5">
                            
                            <!-- product name -->
                             <div class="flex justify-between">
                                <div class="text-3xl text-yellow-500 font-semibold uppercase">{{ $product->productname }}</div>
                                <button wire:click="removeproductfromcart({{ $product->id }})" class="cursor-pointer">
                                    <svg class="w-6 h-6 text-gray-500 dark:text-gray-500" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18 17.94 6M18 18 6.06 6"/>
                                    </svg>
                                </button>
                             </div>

                            <!-- price -->
                              <div>
                                @if ($product->sale_price !== "")
                                    <div class="flex items-center">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24"><path fill="oklch(55.1% 0.027 264.364)" d="M17 6V4H6v2h3.5c1.302 0 2.401.838 2.815 2H6v2h6.315A2.994 2.994 0 0 1 9.5 12H6v2.414L11.586 20h2.828l-6-6H9.5a5.007 5.007 0 0 0 4.898-4H17V8h-2.602a4.933 4.933 0 0 0-.924-2H17z"></path></svg>
                                        {{ $product->sale_price }}
                                    </div>
                                @else
                                    <div class="flex items-center">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24"><path fill="oklch(55.1% 0.027 264.364)" d="M17 6V4H6v2h3.5c1.302 0 2.401.838 2.815 2H6v2h6.315A2.994 2.994 0 0 1 9.5 12H6v2.414L11.586 20h2.828l-6-6H9.5a5.007 5.007 0 0 0 4.898-4H17V8h-2.602a4.933 4.933 0 0 0-.924-2H17z"></path></svg>
                                        {{ $product->price }}
                                    </div>
                                @endif
                              </div>

                            <!-- cateogry -->
                                <div>
                                    <div>{{ $product->category->name }}</div>
                                </div>

                            <!-- quantity -->
                                <div class="flex space-x-5">
                                    <button wire:click="increasequantity({{ $product->id }})">
                                        <svg class="w-6 h-6 text-gray-500 dark:text-gray-500" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 12h14m-7 7V5"/>
                                        </svg>
                                    </button>
                                    <div class="bg-yellow-500 w-20 text-center text-white rounded">{{ $product->quantity }}</div>
                                    <button wire:click="decreasequantity({{ $product->id }})">
                                        <svg class="w-6 h-6 text-gray-500 dark:text-gray-500" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 12h14"/>
                                        </svg>
                                    </button>
                                </div>

                        </div>
                    </div>
                
                @endforeach

            </div>

            <!-- right section code, here i am showing price details -->
            <div class="col-span-4 px-5">
                <div class="bg-gray-200 p-5 space-y-3 rounded">
                    @foreach ($cart_products as $pro)
                    <div class="flex justify-between">
                        <div class="uppercase">{{ $pro->productname }}</div>
                        <div class="flex items-center">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24"><path fill="oklch(55.1% 0.027 264.364)" d="M17 6V4H6v2h3.5c1.302 0 2.401.838 2.815 2H6v2h6.315A2.994 2.994 0 0 1 9.5 12H6v2.414L11.586 20h2.828l-6-6H9.5a5.007 5.007 0 0 0 4.898-4H17V8h-2.602a4.933 4.933 0 0 0-.924-2H17z"></path></svg>
                            {{ ($pro->sale_price ?? $pro->price) * $pro->quantity }}
                        </div>
                    </div>
                    @endforeach

                    <!-- Total price -->
                    <div class="flex justify-between border-t-1 mt-5 pt-3">
                        <div>Total</div>
                        <div class="flex items-center">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24"><path fill="oklch(55.1% 0.027 264.364)" d="M17 6V4H6v2h3.5c1.302 0 2.401.838 2.815 2H6v2h6.315A2.994 2.994 0 0 1 9.5 12H6v2.414L11.586 20h2.828l-6-6H9.5a5.007 5.007 0 0 0 4.898-4H17V8h-2.602a4.933 4.933 0 0 0-.924-2H17z"></path></svg>
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
