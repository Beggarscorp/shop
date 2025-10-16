<header class="w-full shadow-md">


      <div 
        x-data="{ show: false, message: '' }" 
        x-on:show-toast.window="show = true; message = $event.detail.message; setTimeout(() => show = false, 3000)" 
        x-show="show" 
        x-transition 
        class="fixed top-15 right-5 bg-green-600 text-white px-5 py-3 rounded-lg shadow-lg z-10">
        <span x-text="message"></span>
      </div>


  <!-- Upper Header -->
  <div class="flex justify-between items-center px-4 py-3 bg-yellow-500 text-white">
    <!-- Logo -->
    <div class="text-xl font-bold">
      <a href="/"><img src="{{ asset('assets/images/logos/header-logo.png') }}" alt="logo" class="w-1/4"></a>
    </div>

    
    
    <!-- Icons -->
    <div class="flex items-center space-x-2">
      <!-- when customer logged in  -->
      @auth
        <a wire:navigate href="{{ route('dashboard') }}" aria-label="User" class="hover:text-gray-300 cursor-pointer">
          <svg class="w-8 h-8 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="28" height="28" fill="none" viewBox="0 0 28 28">
            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M12 21a9 9 0 1 0 0-18 9 9 0 0 0 0 18Zm0 0a8.949 8.949 0 0 0 4.951-1.488A3.987 3.987 0 0 0 13 16h-2a3.987 3.987 0 0 0-3.951 3.512A8.948 8.948 0 0 0 12 21Zm3-11a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
          </svg>
        </a>
      @endauth

      <!-- when customer logged out -->
      @guest
      <a wire:navigate href="{{ route('login') }}">
        <svg class="w-8 h-8 text-gray-800 dark:text-white" xmlns="http://www.w3.org/2000/svg" width="28" height="28" fill="none" viewBox="0 0 28 28" aria-hidden="true">
        <circle cx="14" cy="10" r="4" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
        <path d="M6 22c0-4 5-6 8-6s8 2 8 6" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
      </svg>
      </a>
      @endguest


      <a  wire:navigate href="{{ route('products-cart') }}"  aria-label="Cart" class="hover:text-gray-300 cursor-pointer relative">
        <svg class="w-8 h-8 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="28" height="28" fill="none" viewBox="0 0 28 28">
          <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M5 4h1.5L9 16m0 0h8m-8 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4Zm8 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4Zm-8.5-3h9.25L19 7H7.312" />
        </svg>
        @if($cartCount > 0)
          <span class="absolute -top-2 -right-2 bg-yellow-600 text-white text-xs w-5 h-5 flex items-center justify-center rounded-full">
              {{ $cartCount }}
          </span>
        @endif
      </a>

      

    </div>
  </div>

  <!-- Navigation Links -->
  <nav class="bg-yellow-600 text-white flex justify-content-center">
    <div class="max-w-7xl mx-auto px-4">
      <div class="flex justify-between items-center">
        <!-- Desktop Links -->
        <div class="hidden md:flex space-x-6 py-2">
          <a wire:navigate href="/" class="hover:text-gray-300">Home</a>
          <a wire:navigate href="/shop" class="hover:text-gray-300">Shop</a>
          <a wire:navigate href="#" class="hover:text-gray-300">About</a>
          <a wire:navigate href="#" class="hover:text-gray-300">Services</a>
          <a wire:navigate href="#" class="hover:text-gray-300">Blog</a>
          <a wire:navigate href="#" class="hover:text-gray-300">Contact</a>
        </div>

        <!-- Mobile Menu Button -->
        <div class="md:hidden flex items-center">
          <button id="menu-btn" class="focus:outline-none">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
            </svg>
          </button>
        </div>
      </div>
    </div>

    <!-- Mobile Menu -->
    <div id="mobile-menu" class="hidden md:hidden px-4 pb-4 space-y-2">
      <a wire:navigate href="/" class="block py-2 hover:text-gray-300">Home</a>
      <a wire:navigate href="/shop" class="block py-2 hover:text-gray-300">Shop</a>
      <a wire:navigate href="#" class="block py-2 hover:text-gray-300">About</a>
      <a wire:navigate href="#" class="block py-2 hover:text-gray-300">Services</a>
      <a wire:navigate href="#" class="block py-2 hover:text-gray-300">Blog</a>
      <a wire:navigate href="#" class="block py-2 hover:text-gray-300">Contact</a>
    </div>
  </nav>
</header>
