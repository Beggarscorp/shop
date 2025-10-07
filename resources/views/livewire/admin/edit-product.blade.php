<div class="p-6 bg-gray-50 min-h-screen">
    <div class="max-w-5xl mx-auto bg-white shadow-lg rounded-2xl p-6">
        <h2 class="text-2xl font-semibold text-gray-800 mb-6">Edit Product</h2>

        @if (session('success'))
            <div class="bg-green-100 border border-green-400 text-green-800 px-4 py-2 rounded mb-4">
                {{ session('success') }}
            </div>
        @endif

        <form wire:submit.prevent="updateProduct" class="space-y-6">

            <!-- Product Name & Slug -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div>
                    <label class="block text-sm font-medium text-gray-700">Product Name</label>
                    <input type="text" wire:model="productname" wire:input="generateSlug($event.target.value)"
                        class="w-full border border-gray-300 rounded px-3 py-2" />
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700">Slug</label>
                    <input type="text" wire:model="slug"
                        class="w-full border border-gray-300 rounded px-3 py-2 bg-gray-100" readonly />
                </div>
            </div>

            <!-- Description -->
            <div>
                <label class="block text-sm font-medium text-gray-700">Description</label>
                <textarea wire:model.defer="discription" class="w-full border border-gray-300 rounded px-3 py-2"></textarea>
            </div>

            <!-- Price, Sale Price, Stock -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                <div>
                    <label class="block text-sm font-medium text-gray-700">Price</label>
                    <input type="number" wire:model.defer="price" step="0.01"
                        class="w-full border border-gray-300 rounded px-3 py-2" />
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700">Sale Price</label>
                    <input type="number" wire:model.defer="sale_price" step="0.01"
                        class="w-full border border-gray-300 rounded px-3 py-2" />
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700">Stock</label>
                    <input type="number" wire:model.defer="stock"
                        class="w-full border border-gray-300 rounded px-3 py-2" />
                </div>
            </div>

            <!-- Category & Status -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div>
                    <label class="block text-sm font-medium text-gray-700">Category</label>
                    <select wire:model.defer="category_id"
                        class="w-full border border-gray-300 rounded px-3 py-2">
                        <option value="">Select Category</option>
                        @foreach ($categories as $category)
                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                        @endforeach
                    </select>
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700">Status</label>
                    <select wire:model.defer="status"
                        class="w-full border border-gray-300 rounded px-3 py-2">
                        <option value="active">Active</option>
                        <option value="inactive">Inactive</option>
                    </select>
                </div>
            </div>

            <!-- Main Product Image -->
            <div>
                <label class="block text-sm font-medium text-gray-700">Product Image</label>
                <div class="flex items-center gap-4">
                    @if ($productimage)
                        <img src="{{ asset('storage/' . $productimage) }}" class="w-20 h-20 object-cover rounded border">
                    @endif
                    <input type="file" wire:model="new_productimage" class="block text-sm text-gray-700" />
                </div>
            </div>

            <!-- Product Gallery Images -->
            <div>
                <label class="block text-sm font-medium text-gray-700">Product Gallery Images</label>

                <!-- Existing Gallery Images -->
                @if ($productimagegallery && count($productimagegallery) > 0)
                    <div class="flex flex-wrap gap-3 mt-2">
                        @foreach ($productimagegallery as $image)
                            <div class="relative">
                                <img src="{{ asset('storage/' . $image) }}" class="w-20 h-20 object-cover rounded border">
                            </div>
                        @endforeach
                    </div>
                @endif

                <!-- Upload New Gallery Images -->
                <div class="mt-3">
                    <input type="file" wire:model="new_productimagegallery" multiple
                        class="block text-sm text-gray-700" />
                </div>
            </div>

            <!-- Submit Button -->
            <button type="submit"
                class="bg-blue-600 hover:bg-blue-700 text-white font-semibold px-6 py-2 rounded-lg shadow">
                Update Product
            </button>
        </form>
    </div>
</div>