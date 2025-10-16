<div class="container mx-auto py-8 px-3 sm:px-0 md:px-0 lg:px-0">
    <div class="grid grid-cols-1 sm:grid-cols-1 md:grid-cols-2 lg:grid-cols-2 gap-10">
        
        <!-- Image section  -->

        <div>
            <img src="{{ Storage::url($product->productimage) }}" alt="product-image" class="rounded">
            <div class="grid grid-cols-3 gap-5 p-3">
                @foreach (json_decode($product->productimagegallery) as $image)
                    <div><img src="{{ Storage::url($image) }}" alt="product-image" class="rounded"></div>
                @endforeach
            </div>
        </div>

        <!-- Content section  -->

        <div class="border-gray-300 px-5 text-gray-500">

            <!-- product name  -->
             <div class="mb-2 space-y-3">
                <div class="text-3xl text-yellow-600 font-semibold">{{ $product->productname }}</div>
                <div class="flex items-center"><svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24"><path fill="oklch(55.1% 0.027 264.364)" d="M17 6V4H6v2h3.5c1.302 0 2.401.838 2.815 2H6v2h6.315A2.994 2.994 0 0 1 9.5 12H6v2.414L11.586 20h2.828l-6-6H9.5a5.007 5.007 0 0 0 4.898-4H17V8h-2.602a4.933 4.933 0 0 0-.924-2H17z"></path></svg>{{ $product->price }}</div>
             </div>

             <!-- product description -->
              <div class="border-b-1 border-gray-300 mb-5 pb-3">
                <div class="py-2 font-semibold">Description :</div>
                <div>{!! nl2br(e($product->discription)) !!}</div>
            </div>
            
            <!-- size & fit  -->
            <div class="border-b-1 border-gray-300 mb-5 pb-3">
                <div class="py-2 font-semibold">Size & Fit :</div>
                <div>{!! nl2br(e($product->sizeandfit)) !!}</div>
            </div>
            
            <!-- Material & care  -->
            <div class="border-b-1 border-gray-300 mb-5 pb-3">
                <div class="py-2 font-semibold">Material & Care :</div>
                <div>{!! nl2br(e($product->materialandcare)) !!}</div>
            </div>
            
            <!-- spacification  -->
            <div class="border-b-1 border-gray-300 mb-5 pb-3">
                <div class="py-2 font-semibold">Spacification :</div>
                <div>{!! nl2br(e($product->spacification)) !!}</div>
            </div>
            
            <!-- impact product  -->
            <div class="border-b-1 border-gray-300 mb-5 pb-3">
                <div class="py-2 font-semibold">Impact Product By :</div>
                <div>{!! nl2br(e($product->impact_product)) !!}</div>
            </div>

            <div class="space-y-5">
                <button wire:click="addtocart({{ $product->id }})" class="w-full py-2 hover:scale-101 bg-yellow-600 text-white flex justify-center rounded items-center font-semibold">
                    Add to Cart 
                    <svg class="w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 4h1.5L9 16m0 0h8m-8 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4Zm8 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4Zm-8.5-3h9.25L19 7h-1M8 7h-.688M13 5v4m-2-2h4"/>
                    </svg>
                </button>
                <a href="{{ route('shop') }}" wire:navigate class="cursor-pointer w-full py-2 hover:scale-102 transition duration-200 ease-in-out bg-yellow-600 text-white flex justify-center rounded items-center font-semibold">Continue Shopping</a>
            </div>
            <div></div>
             
        </div>


    </div>
</div>
