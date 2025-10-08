<div class="max-w-2xl mx-auto bg-white shadow-lg rounded-2xl p-8">
    <h2 class="text-2xl font-semibold mb-6 text-gray-800 border-b pb-3">Edit Category</h2>

    @if (session('success'))
        <div class="bg-green-100 text-green-800 px-4 py-3 rounded mb-4 border border-green-300">
            {{ session('success') }}
        </div>
    @endif

    <form wire:submit.prevent="update" class="space-y-6">
        <!-- Category Name -->
        <div>
            <label class="block text-gray-700 font-medium mb-2">Category Name</label>
            <input type="text"
                   wire:model.defer="name"
                   wire:input="generateSlug($event.target.value)"
                   class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:ring-2 focus:ring-blue-500"
                   placeholder="Enter category name">
            @error('name') <p class="text-red-500 text-sm mt-1">{{ $message }}</p> @enderror
        </div>

        <!-- Slug -->
        <div>
            <label class="block text-gray-700 font-medium mb-2">Slug</label>
            <input type="text"
                   wire:model.defer="slug"
                   class="w-full border border-gray-300 rounded-lg px-3 py-2 bg-gray-100"
                   readonly
                   placeholder="Slug will auto-generate">
            @error('slug') <p class="text-red-500 text-sm mt-1">{{ $message }}</p> @enderror
        </div>

        <!-- Parent Category -->
        <div>
            <label class="block text-gray-700 font-medium mb-2">Parent Category</label>
            <select wire:model.defer="parent_id"
                    class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:ring-2 focus:ring-blue-500">
                <option value="">-- Select Parent Category --</option>
                @foreach ($categories as $categoryItem)
                    <option value="{{ $categoryItem->id }}"
                        @if($categoryItem->id == $parent_id) selected @endif>
                        {{ $categoryItem->name }}
                    </option>
                @endforeach
            </select>
            @error('parent_id') <p class="text-red-500 text-sm mt-1">{{ $message }}</p> @enderror
        </div>

        <!-- Category Image -->
        <div>
            <label class="block text-gray-700 font-medium mb-2">Category Image</label>
            <input type="file" wire:model="image"
                   class="w-full border border-gray-300 rounded-lg px-3 py-2">
            
            <!-- Show existing image if no new upload -->
            @if ($image)
                <img src="{{ $image->temporaryUrl() }}" alt="Preview"
                     class="w-24 h-24 object-cover rounded-lg mt-3 border border-gray-200">
            @elseif($existingImage)
                <img src="{{ asset('storage/' . $existingImage) }}" alt="Existing Image"
                     class="w-24 h-24 object-cover rounded-lg mt-3 border border-gray-200">
            @endif

            @error('image') <p class="text-red-500 text-sm mt-1">{{ $message }}</p> @enderror
        </div>

        <!-- Submit Button -->
        <div class="flex justify-end">
            <button type="submit"
                    class="bg-blue-600 hover:bg-blue-700 text-white font-semibold px-6 py-2 rounded-lg shadow">
                Update Category
            </button>
        </div>
    </form>
</div>
