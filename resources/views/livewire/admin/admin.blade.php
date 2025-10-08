<div class="p-6 bg-gray-100 min-h-screen">

    <!-- Dashboard Header -->
    <div class="flex items-center justify-between mb-6">
        <h1 class="text-3xl font-bold text-gray-800">Admin Dashboard</h1>
        <div class="flex space-x-2">
            <a href="{{ route('admin.add-product') }}" class="bg-blue-600 text-white px-4 py-2 rounded shadow hover:bg-blue-700">Add Product</a>
            <a href="{{ route('admin.add-category') }}" class="bg-green-600 text-white px-4 py-2 rounded shadow hover:bg-green-700">Add Category</a>
        </div>
    </div>

    <!-- Metric Cards -->
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6 mb-6">
        <!-- Total Orders -->
        <div class="bg-white rounded-xl shadow p-5 flex items-center justify-between">
            <div>
                <p class="text-gray-500">Total Orders</p>
                <h2 class="text-2xl font-bold">{{ $totalOrders }}</h2>
            </div>
            <div class="text-blue-500">
                <i class="fas fa-shopping-cart fa-2x"></i>
            </div>
        </div>

        <!-- Total Products -->
        <div class="bg-white rounded-xl shadow p-5 flex items-center justify-between">
            <div>
                <p class="text-gray-500">Total Products</p>
                <h2 class="text-2xl font-bold">{{ $totalProducts }}</h2>
            </div>
            <div class="text-green-500">
                <i class="fas fa-box fa-2x"></i>
            </div>
        </div>

        <!-- Total Categories -->
        <div class="bg-white rounded-xl shadow p-5 flex items-center justify-between">
            <div>
                <p class="text-gray-500">Total Categories</p>
                <h2 class="text-2xl font-bold">{{ $totalCategories }}</h2>
            </div>
            <div class="text-yellow-500">
                <i class="fas fa-tags fa-2x"></i>
            </div>
        </div>

        <!-- Total Customers -->
        <div class="bg-white rounded-xl shadow p-5 flex items-center justify-between">
            <div>
                <p class="text-gray-500">Total Customers</p>
                <h2 class="text-2xl font-bold">{{ $totalCustomers }}</h2>
            </div>
            <div class="text-purple-500">
                <i class="fas fa-users fa-2x"></i>
            </div>
        </div>
    </div>

    <!-- Recent Orders Table -->
   

    <!-- Recently Added Products Table -->
    <div class="bg-white rounded-xl shadow p-5 mt-6">
        <h3 class="text-xl font-semibold mb-4">Recently Added Products</h3>
        <table class="min-w-full table-auto border">
            <thead>
                <tr class="bg-gray-100">
                    <th class="px-4 py-2">Product Name</th>
                    <th class="px-4 py-2">Category</th>
                    <th class="px-4 py-2">Price</th>
                    <th class="px-4 py-2">Stock</th>
                    <th class="px-4 py-2">Date Added</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($recentProducts as $product)
                    <tr class="border-t">
                        <td class="px-4 py-2">{{ $product->productname }}</td>
                        <td class="px-4 py-2">{{ $product->category->name ?? '-' }}</td>
                        <td class="px-4 py-2">${{ $product->price }}</td>
                        <td class="px-4 py-2">{{ $product->stock }}</td>
                        <td class="px-4 py-2">{{ $product->created_at->format('d M Y') }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

</div>
