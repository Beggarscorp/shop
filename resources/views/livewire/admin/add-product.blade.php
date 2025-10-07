<div class="max-w-6xl mx-auto px-4">
    <h1 class="text-3xl font-bold mb-6 text-gray-800">Add New Product</h1>

    @if (session('success'))
        <div class="bg-green-100 text-green-800 px-4 py-3 rounded mb-4 border border-green-300">
            {{ session('success') }}
        </div>
    @endif

    <form wire:submit.prevent="save" enctype="multipart/form-data" class="space-y-8 bg-white p-8 rounded-lg shadow-md">

        <!-- Product Info -->
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <div>
                <label class="block text-gray-700 font-medium mb-2">Product Name</label>
                <input type="text" wire:model.defer="productname" wire:input="generateSlug($event.target.value)"
                       class="w-full border border-gray-300 rounded px-3 py-2 focus:ring-2 focus:ring-blue-500" 
                       placeholder="Enter product name">
                @error('productname') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
            </div>

            <div>
                <label class="block text-gray-700 font-medium mb-2">Slug</label>
                <input type="text" wire:model.defer="slug" readonly
                       class="w-full border border-gray-300 rounded px-3 py-2 focus:ring-2 focus:ring-blue-500"
                       placeholder="product-name-url">
                @error('slug') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
            </div>

            <div class="md:col-span-2">
                <label class="block text-gray-700 font-medium mb-2">Description</label>
                <textarea wire:model.defer="discription" rows="4"
                          class="w-full border border-gray-300 rounded px-3 py-2 focus:ring-2 focus:ring-blue-500"
                          placeholder="Write a detailed product description"></textarea>
                @error('discription') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
            </div>
        </div>

        <!-- Pricing & Stock -->
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            <div>
                <label class="block text-gray-700 font-medium mb-2">Price</label>
                <input type="number" wire:model.defer="price" step="0.01"
                       class="w-full border border-gray-300 rounded px-3 py-2 focus:ring-2 focus:ring-blue-500">
                @error('price') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
            </div>

            <div>
                <label class="block text-gray-700 font-medium mb-2">Sale Price</label>
                <input type="number" wire:model.defer="sale_price" step="0.01"
                       class="w-full border border-gray-300 rounded px-3 py-2 focus:ring-2 focus:ring-blue-500">
                @error('sale_price') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
            </div>

            <div>
                <label class="block text-gray-700 font-medium mb-2">Stock</label>
                <input type="number" wire:model.defer="stock"
                       class="w-full border border-gray-300 rounded px-3 py-2 focus:ring-2 focus:ring-blue-500">
                @error('stock') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
            </div>
        </div>

        <!-- Category & Status -->
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <div>
                <label class="block text-gray-700 font-medium mb-2">Category</label>
                <select wire:model.defer="category_id"
                        class="w-full border border-gray-300 rounded px-3 py-2 focus:ring-2 focus:ring-blue-500">
                    <option value="">Select Category</option>
                    @foreach($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                    @endforeach
                </select>
                @error('category_id') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
            </div>

            <div>
                <label class="block text-gray-700 font-medium mb-2">Status</label>
                <select wire:model.defer="status"
                        class="w-full border border-gray-300 rounded px-3 py-2 focus:ring-2 focus:ring-blue-500">
                    <option value="active">Active</option>
                    <option value="inactive">Inactive</option>
                </select>
                @error('status') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
            </div>
        </div>

        <!-- Best Seller & Min Order -->
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <div class="flex items-center mt-2">
                <input type="checkbox" wire:model.defer="best_seller" class="mr-2">
                <label class="text-gray-700 font-medium">Best Seller</label>
            </div>

            <div>
                <label class="block text-gray-700 font-medium mb-2">Minimum Order Quantity</label>
                <input type="number" wire:model.defer="min_order"
                       class="w-full border border-gray-300 rounded px-3 py-2 focus:ring-2 focus:ring-blue-500">
                @error('min_order') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
            </div>
        </div>

        <!-- Images -->
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <div>
                <label class="block text-gray-700 font-medium mb-2">Main Product Image</label>
                <input type="file" wire:model="productimage"
                       class="w-full border border-gray-300 rounded px-3 py-2">
                @error('productimage') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
            </div>

            <div>
                <label class="block text-gray-700 font-medium mb-2">Product Image Gallery</label>
                <input type="file" wire:model="productimagegallery" multiple
                       class="w-full border border-gray-300 rounded px-3 py-2">
                @error('productimagegallery') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
            </div>
        </div>

        <!-- Other Details -->
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            <div>
                <label class="block text-gray-700 font-medium mb-2">Size & Fit</label>
                <textarea wire:model.defer="sizeandfit" class="w-full border border-gray-300 rounded px-3 py-2"></textarea>
            </div>

            <div>
                <label class="block text-gray-700 font-medium mb-2">Material & Care</label>
                <textarea wire:model.defer="materialandcare" class="w-full border border-gray-300 rounded px-3 py-2"></textarea>
            </div>

            <div>
                <label class="block text-gray-700 font-medium mb-2">Specification</label>
                <textarea wire:model.defer="spacification" class="w-full border border-gray-300 rounded px-3 py-2"></textarea>
            </div>
        </div>

        <div>
            <label class="block text-gray-700 font-medium mb-2">Impact Product</label>
            <textarea wire:model.defer="impact_product" class="w-full border border-gray-300 rounded px-3 py-2"></textarea>
        </div>

        <!-- Submit Button -->
        <div class="flex justify-end">
            <button type="submit"
                    class="bg-blue-600 text-white px-6 py-2 rounded hover:bg-blue-700 transition">
                Save Product
            </button>
        </div>

    </form>
</div>
