<div>

    <div class="container mx-auto py-8 px-3 sm:px-0 md:px-0 lg:px-0">

        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-2 lg:grid-cols-4 gap-8">

            @foreach ($products as $product)
                
                <!-- product card -->
                <div class="text-gray-500 space-y-3">
                    <div>
                        <a href="{{ route('product-details',$product->id) }}" target="_blank" rel="noopener noreferrer">
                            <img src="{{ Storage::url($product->productimage) }}" alt="product-image" class="rounded">
                        </a>
                    </div>

                    <div class="flex flex-wrap justify-between">
                        <div class="text-yellow-600 text-md text-center">{{ $product->productname }}</div>
                        <div class="flex items-center"><svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24"><path fill="oklch(55.1% 0.027 264.364)" d="M17 6V4H6v2h3.5c1.302 0 2.401.838 2.815 2H6v2h6.315A2.994 2.994 0 0 1 9.5 12H6v2.414L11.586 20h2.828l-6-6H9.5a5.007 5.007 0 0 0 4.898-4H17V8h-2.602a4.933 4.933 0 0 0-.924-2H17z"></path></svg>
                            @if (!empty($product->sale_price) && (int)$product->sale_price !== 0)
                            <span class="line-through text-red-600 pr-2">{{ $product->price }}</span>                                
                                <span>{{ $product->sale_price }}</span>
                            @else
                                <span>{{ $product->price }}</span>                                
                            @endif
                        </div>
                    </div>

                    <div>
                        <button wire:click="addtocart({{ $product->id }})" class="cursor-pointer w-full bg-yellow-600 text-white flex justify-center items-center rounded py-1">
                            Add to Cart 
                            <svg class="w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 4h1.5L9 16m0 0h8m-8 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4Zm8 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4Zm-8.5-3h9.25L19 7h-1M8 7h-.688M13 5v4m-2-2h4"/>
                            </svg>
                        </button>
                    </div>

                </div>
            
            @endforeach

        </div>
    </div>
</div>
