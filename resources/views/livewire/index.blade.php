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

    <section class="pb-20">
    <div class="heading text-center text-3xl font-bold mb-10">Who We Are</div>

    <div class="container mx-auto flex flex-col md:flex-row items-center gap-10">
        <!-- Left side image -->
        <div class="md:w-1/2 w-full flex justify-center">
            <img src="{{ asset('assets/images/Chandra sir.png') }}" alt="founder-image" class="w-full max-w-sm rounded-lg shadow-lg object-cover">
        </div>

        <!-- Right side text box -->
        <div class="md:w-1/2 w-full bg-yellow-500 p-5 rounded-lg shadow-md">
            <div class="border border-gray-400 p-5 bg-white/20">
                <p class="text-gray-800 leading-relaxed">
                    Beggars' Corporation is a pioneering "Profit with Purpose" startup dedicated to transforming lives and creating meaningful impact.
                    As a first of its kind, we are trying to break both the poverty trap and the begging trap by turning beggars into entrepreneurs,
                    restoring their dignity and independence. With our call ‘Don’t Donate, Invest or Purchase’, network of Citizens for Begging Free India,
                    and schemes like ‘One Beggar, One Mentor’, we are creating an ecosystem that can take care of beggary at the roots where it originated from.
                </p>
                <button class="bg-yellow-700 hover:bg-yellow-800 text-white px-5 py-2 mt-4 rounded-md transition">
                    Explore More
                </button>
            </div>
        </div>
    </div>
</section>

    
</div>
