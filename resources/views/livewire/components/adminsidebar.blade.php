<div class="bg-blue-900 text-white h-screen w-64 p-6 flex flex-col justify-between shadow-lg">

      <div 
        x-data="{ show: false, message: '' }" 
        x-on:show-toast.window="show = true; message = $event.detail.message; setTimeout(() => show = false, 3000)" 
        x-show="show" 
        x-transition 
        class="fixed top-5 right-5 bg-green-600 text-white px-5 py-3 rounded-lg shadow-lg z-10">
        <span x-text="message"></span>
      </div>


    <!-- Logo / Brand -->
    <div class="mb-10">
        <h1 class="text-2xl font-bold mb-6 text-center">Admin Panel</h1>
    </div>

    <!-- Navigation Links -->
    <nav class="space-y-2">
        <a wire:navigate href="{{ route('admin') }}" 
           class="flex items-center px-4 py-2 rounded-lg hover:bg-blue-700 transition-colors duration-200">
            <i class="fas fa-tachometer-alt mr-3"></i> Dashboard
        </a>

        <a target="_blank" href="{{ route('shop') }}" 
           class="flex items-center px-4 py-2 rounded-lg hover:bg-blue-700 transition-colors duration-200">
            <i class="fas fa-store mr-3"></i> Shop
        </a>

        <a wire:navigate href="{{ route('admin.add-product') }}" 
           class="flex items-center px-4 py-2 rounded-lg hover:bg-blue-700 transition-colors duration-200">
            <i class="fas fa-plus mr-3"></i> Add Product
        </a>

        <a wire:navigate href="{{ route('admin.add-category') }}" 
           class="flex items-center px-4 py-2 rounded-lg hover:bg-blue-700 transition-colors duration-200">
            <i class="fas fa-plus-circle mr-3"></i> Add Category
        </a>

        <a wire:navigate href="{{ route('admin.categories') }}" 
           class="flex items-center px-4 py-2 rounded-lg hover:bg-blue-700 transition-colors duration-200">
            <i class="fas fa-tags mr-3"></i> Categories
        </a>

        <a wire:navigate href="{{ route('admin.products') }}" 
           class="flex items-center px-4 py-2 rounded-lg hover:bg-blue-700 transition-colors duration-200">
            <i class="fas fa-box mr-3"></i> Products
        </a>

        <a wire:navigate href="{{ route('admin.orders') }}" 
           class="flex items-center px-4 py-2 rounded-lg hover:bg-blue-700 transition-colors duration-200">
            <i class="fas fa-shopping-cart mr-3"></i> Orders
        </a>
    </nav>

    <!-- Logout or Footer -->
    <div class="mt-10">
        <button wire:click="logout()" 
           class="flex items-center px-4 py-2 rounded-lg hover:bg-red-600 transition-colors duration-200">
            <i class="fas fa-sign-out-alt mr-3"></i> Logout
        </button>
    </div>
</div>
