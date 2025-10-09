<section>
    <div class="container mx-auto pb-10">

        <div class="mb-10 text-center text-4xl text-yellow-500">Categories</div>

        <div class="grid grid-cols-3">

            @foreach ($categories as $category)

            <div class="">
                <div class="relative">
                    <a wire:navigate href="{{ route('shop.category',['slug'=>$category->slug,'categoryid'=>$category->id]) }}">
                        <img src="{{ Storage::url($category->image) }}" alt="category-image">
                        <div class="absolute top-0 w-full h-full">
                            <div class="bg-gradient-to-tr from-[#74746e] to-transparent flex justify-center items-center h-full">
                                <div class="text-yellow-500 text-4xl uppercase">{{ $category->name }}</div>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
            
            @endforeach

        </div>
    </div>
</section>