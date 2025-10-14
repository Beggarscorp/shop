<div class="p-6">
    <h2 class="text-xl font-bold mb-4">All Categories</h2>

    <table class="min-w-full border border-gray-300 rounded-lg overflow-hidden">
        <thead class="bg-gray-100">
            <tr>
                <th class="border px-4 py-2 text-left">#</th>
                <th class="border px-4 py-2 text-left">Name</th>
                <th class="border px-4 py-2 text-left">Parent Category</th>
                <th class="border px-4 py-2 text-center">Action</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($categories as $index => $category)
                <tr class="hover:bg-gray-50">
                    <td class="border px-4 py-2">{{ $index + 1 }}</td>
                    <td class="border px-4 py-2">{{ $category->name }}</td>
                    <td class="border px-4 py-2">
                        {{ $category->parent?->name ?? '—' }}
                    </td>
                    <td class="border px-4 py-2 text-center space-x-2">
                        <a wire:navigate href="{{ route('admin.edit-category',$category->id) }}"
                                class="bg-blue-500 text-white px-3 py-1 rounded hover:bg-blue-600">
                                Edit
                        </a>
                        <button wire:click="delete({{ $category->id }})"
                                onclick="return confirm('Are you sure?')"
                                class="bg-red-500 text-white px-3 py-1 rounded hover:bg-red-600">
                            Delete
                        </button>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="4" class="text-center py-3 text-gray-500">No categories found.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>
