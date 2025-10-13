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
    
</div>
