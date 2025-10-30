<section>
    @if ($bestseller->isNotEmpty())

        <div class="container mx-auto pb-20">
            
            <div class="heading">Best seller</div>

            <div class="grid grid-cols-4 gap-5">
                
                @foreach ($bestseller as $product)
        
                <div class="text-center space-y-2 text-gray-500">
                    <div>
                        <img src="{{ Storage::url($product->productimage) }}" alt="product-image">
                    </div>
                    <div class="">
                        <div class="text-lg">{{ $product->productname }}</div>
                    </div>
                    <div class="">
                        <div class="flex item-center justify-center">
                            <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" viewBox="0 0 20 20"><path fill="oklch(55.1% 0.027 264.364)" d="M17 6V4H6v2h3.5c1.302 0 2.401.838 2.815 2H6v2h6.315A2.994 2.994 0 0 1 9.5 12H6v2.414L11.586 20h2.828l-6-6H9.5a5.007 5.007 0 0 0 4.898-4H17V8h-2.602a4.933 4.933 0 0 0-.924-2H17z"></path></svg>
                            <div class="text-sm">{{ $product->sale_price ?? $product->price }}</div>
                        </div>
                    </div>
                </div>

                
                @endforeach

            </div>
        </div>

    @endif

</section>