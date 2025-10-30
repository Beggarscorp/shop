<div>

    <section>
        <div class="container mx-auto pb-10">
            <div class="py-5 px-5 sm:px-0 md:px-0">
                <img src="{{ asset('assets/images/Banner-new.png') }}" alt="banner-image" class="shadow rounded">
            </div>
        </div>
    </section>

    <!-- categories -->
    @livewire('components.homepage.category')

    <!-- best seller -->
    @livewire('components.homepage.bestseller')

    <!-- studio video -->
    <section class="pb-20">
        <div class="heading">Visit beggars corporation studio in varanasi</div>
        <div class="">
            <video src="{{ asset('assets/videos/office-tour-video.mp4') }}" autoplay
                muted
                loop
                playsinline class="w-full h-[90vh] object-cover"></video>
        </div>
    </section>

    <!-- who we are section  -->

    <section class="pb-10">
        <div class="heading">Who We Are</div>

        <div class="container mx-auto">
            <div class="grid grid-cols-12 px-5">
                <div class="col-span-12 md:col-span-6 text-center">
                    <img src="{{ asset('assets/images/Chandra sir.png') }}" alt="founder-image" class="w-full" />
                </div>
                <div class="col-span-12 md:col-span-6 p-5">
                    <p class="mb-5 fw-bold">
                        Beggars' Corporation is a pioneering "Profit with Purpose" startup dedicated to transforming lives and creating meaningful impact. As a first of its kind, we are trying to break both the poverty trap and the begging trap by turning beggars into entrepreneurs, restoring their dignity and independence.
                        With our call ‘Don’t Donate, Invest or Purchase’, network of Citizens for Begging Free India, and schemes like ‘One Beggar, One Mentor’, we are creating an ecosystem that can take care of beggary at the roots where it originated from.
                    </p>
                    <a href="https://beggarscorporation.com/" target="_blank" rel="noopener noreferrer" class="bg-yellow-500 px-5 py-1 fw-bold">Explore more</a>            
                </div>
            </div>
        </div>

    </section>


    <!-- impact you can see & show -->

    <section class="pb-10">
        <div class="heading">Impact: You can See & Show</div>

        <div class="container mx-auto">
            <div class="grid grid-cols-12 px-5">
                <div class="col-span-12 md:col-span-6 text-center lg:order-2">
                    <img src="{{ asset('assets/images/rani-di.png') }}" alt="founder-image" class="w-full" />
                </div>
                <div class="col-span-12 md:col-span-6 p-5 lg:order-1">
                    <p class="mb-5 fw-bold">
                        Beggars' Corporation has transformed more than 100 lives. When you wear products made by former beggars, you carry the dreams of a mother for a better future, the joy of their children's innocent smiles, and the collective vision of begging -free India.<br>
                        Our impact extends beyond changing lives to caring for the planet. Our products not only give a second chance to people but also to the Earth, as all our fabrics are sustainable and upcycled.
                    </p>
                    <p class="text-yellow-600 fw-bold my-2">#DontDonatePurchase #PurchasewithPurpose</p>
                    <a href="https://beggarscorporation.com/" target="_blank" rel="noopener noreferrer" class="bg-yellow-500 px-5 py-1 fw-bold">Explore more</a>            
                </div>
            </div>
        </div>

    </section>


    <!-- Journey from ‘Daanjeevi’ to ‘Karmajeevi’ -->

    <section class="pb-10">
        <div class="heading">Journey from ‘Daanjeevi’ to ‘Karmajeevi’</div>

        <div class="container mx-auto">
            <div class="grid grid-cols-12 px-5">
                <div class="col-span-12 md:col-span-6 text-center">
                    <img src="{{ asset('assets/images/sonam-di.png') }}" alt="founder-image" class="w-full" />
                </div>
                <div class="col-span-12 md:col-span-6 p-5">
                    <p class="mb-5 fw-bold">
                        Beggars' Corporation has transformed more than 100 lives. When you wear products made by former beggars, you carry the dreams of a mother for a better future, the joy of their children's innocent smiles, and the collective vision of begging -free India.<br>
                        Our impact extends beyond changing lives to caring for the planet. Our products not only give a second chance to people but also to the Earth, as all our fabrics are sustainable and upcycled.
                    </p>
                    <p class="text-yellow-600 fw-bold my-2">#DontDonatePurchase #PurchasewithPurpose</p>
                    <a href="https://beggarscorporation.com/" target="_blank" rel="noopener noreferrer" class="bg-yellow-500 px-5 py-1 fw-bold">Explore more</a>            
                </div>
            </div>
        </div>

    </section>

    <!-- our best products -->

    <section class="pb-10">
        <div class="heading">Our Best Products</div>
        <div class="container mx-auto">
            <div class="lg:columns-3">
                <div class="columns-2">
                    <div class="p-3"><img class="rounded" src="{{ asset('assets/images/best-product-image/begging-free-india-bag.jpg') }}" alt="product-image"></div>
                    <div class="p-3"><img class="rounded" src="{{ asset('assets/images/best-product-image/Black Patchwork 1.jpg') }}" alt="product-image"></div>
                    <div class="p-3"><img class="rounded" src="{{ asset('assets/images/best-product-image/blue-elephant-saree.png') }}" alt="product-image"></div>
                    <div class="p-3"><img class="rounded" src="{{ asset('assets/images/best-product-image/Shakti fish 1.png') }}" alt="product-image"></div>
                </div>
                <div class="p-3 lg:p-0"><img class="rounded w-full" src="{{ asset('assets/images/best-product-image/silver-cutain.jpg') }}" alt="product-image"></div>
                <div class="columns-2">
                    <div class="p-3"><img class="rounded" src="{{ asset('assets/images/best-product-image/tot-bag.jpg') }}" alt="product-image"></div>
                    <div class="p-3"><img class="rounded" src="{{ asset('assets/images/best-product-image/White Patchwork 2.jpg') }}" alt="product-image"></div>
                    <div class="p-3"><img class="rounded" src="{{ asset('assets/images/best-product-image/yellow-curtain.jpg') }}" alt="product-image"></div>
                    <div class="p-3"><img class="rounded" src="{{ asset('assets/images/best-product-image/yellow-patchwork-saree.png') }}" alt="product-image"></div>
                </div>
            </div>
        </div>
    </section>

    <div>
    ...
 
    <div x-data="{ open: false }">
        <button @click="open = true">Show More...</button>
 
        <ul 
            x-show="open" 
            @click.outside="open = false"
            x-transition:enter="transition ease-out duration-200"
            x-transition:enter-start="opacity-0 transform -translate-y-2 scale-95"
            x-transition:enter-end="opacity-100 transform translate-y-0 scale-100"
            x-transition:leave="transition ease-in duration-150"
            x-transition:leave-start="opacity-100 transform translate-y-0 scale-100"
            x-transition:leave-end="opacity-0 transform -translate-y-2 scale-95"
            >
            <li><button wire:click="archive">Archive</button></li>
            <li><button wire:click="delete">Delete</button></li>
        </ul>
    </div>
</div>
</div>