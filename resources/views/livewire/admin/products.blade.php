<div class="p-6 bg-gray-50 min-h-screen">
    <div class="max-w-7xl mx-auto bg-white shadow-lg rounded-2xl p-6">
        <div class="flex justify-between items-center mb-5">
            <h2 class="text-2xl font-semibold text-gray-800">All Products</h2>
            <a href="{{ route('admin.add-product') }}"
               class="bg-blue-600 hover:bg-blue-700 text-white font-semibold px-4 py-2 rounded-lg shadow">
                + Add Product
            </a>
        </div>

        @if (session('success'))
            <div class="bg-green-100 border border-green-400 text-green-800 px-4 py-2 rounded mb-4">
                {{ session('success') }}
            </div>
        @endif

        <div class="overflow-x-auto">
            <table class="min-w-full border-collapse text-sm">
                <thead>
                    <tr class="bg-gray-100 text-gray-700 uppercase text-sm">
                        <th class="px-4 py-3 border text-left">#</th>
                        <th class="px-4 py-3 border text-left">Image</th>
                        <th class="px-4 py-3 border text-left">Name</th>
                        <th class="px-4 py-3 border text-left">Category</th>
                        <th class="px-4 py-3 border text-center">Price</th>
                        <th class="px-4 py-3 border text-center">Sale Price</th>
                        <th class="px-4 py-3 border text-center">Stock</th>
                        <th class="px-4 py-3 border text-center">Status</th>
                        <th class="px-4 py-3 border text-center">Actions</th>
                    </tr>
                </thead>

                <tbody class="text-gray-800">
                    @forelse ($products as $index => $product)
                        <tr class="border-b hover:bg-gray-50 transition">
                            <td class="px-4 py-3 border">{{ $loop->iteration }}</td>

                            <td class="px-4 py-3 border">
                                @if ($product->productimage)
                                    <img src="{{ asset('storage/'.$product->productimage) }}"
                                         class="w-12 h-12 object-cover rounded-lg border">
                                @else
                                    <span class="text-gray-400 text-sm">No Image</span>
                                @endif
                            </td>

                            <td class="px-4 py-3 border font-medium">{{ $product->productname }}</td>
                            <td class="px-4 py-3 border">{{ $product->category->name ?? 'N/A' }}</td>

                            <td class="px-4 py-3 border text-center">
                                ₹{{ number_format($product->price, 2) }}
                            </td>

                            <td class="px-4 py-3 border text-center">
                                @if ($product->sale_price)
                                    <span class="text-green-600 font-semibold">
                                        ₹{{ number_format($product->sale_price, 2) }}
                                    </span>
                                @else
                                    <span class="text-gray-400">—</span>
                                @endif
                            </td>

                            <td class="px-4 py-3 border text-center">{{ $product->stock }}</td>

                            <td class="px-4 py-3 border text-center">
                                @if ($product->status === 'active')
                                    <span class="bg-green-100 text-green-700 px-3 py-1 rounded-full text-xs font-medium">Active</span>
                                @else
                                    <span class="bg-red-100 text-red-700 px-3 py-1 rounded-full text-xs font-medium">Inactive</span>
                                @endif
                            </td>

                            <td class="px-4 py-3 border text-center space-x-2">
                                <!-- Edit Button -->
                                <a href="{{ route('admin.edit-product', $product->id) }}"
                                   class="inline-flex items-center px-2 py-1 bg-blue-100 text-blue-600 hover:bg-blue-200 rounded-lg transition"
                                   title="Edit">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                              d="M11 17h2M12 2a10 10 0 100 20 10 10 0 000-20zm1.414 3.414L16.95 8.95m-4.536-3.536L7.05 12.364M9 12h3" />
                                    </svg>
                                </a>

                                <!-- Delete Button -->
                                <button wire:click="deleteProduct({{ $product->id }})"
                                        onclick="return confirm('Are you sure you want to delete this product?')"
                                        class="inline-flex items-center px-2 py-1 bg-red-100 text-red-600 hover:bg-red-200 rounded-lg transition"
                                        title="Delete">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                              d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6M1 7h22m-5-4H6a2 2 0 00-2 2v1h16V5a2 2 0 00-2-2z" />
                                    </svg>
                                </button>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="9" class="text-center py-6 text-gray-500">No products available.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
