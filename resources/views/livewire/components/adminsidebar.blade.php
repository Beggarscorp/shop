<div class="bg-blue-800 text-white p-5">
    <div class="space-y-5">
        <div><a class="bg-blue-600 px-5 py-1 rounded" href="{{ route('admin') }}" wire:navigate>Admin</a></div>
        <div><a class="bg-blue-600 px-5 py-1 rounded" href="{{ route('shop') }}" wire:navigate>Shop</a></div>
        <div><a class="bg-blue-600 px-5 py-1 rounded" href="{{ route('admin.add-product') }}" wire:navigate>Add Product</a></div>
        <div><a class="bg-blue-600 px-5 py-1 rounded" href="{{ route('admin.add-category') }}" wire:navigate>Add Category</a></div>
        <div><a class="bg-blue-600 px-5 py-1 rounded" href="{{ route('admin.categories') }}" wire:navigate>Categories</a></div>
        <div><a class="bg-blue-600 px-5 py-1 rounded" href="{{ route('admin.products') }}" wire:navigate>Products</a></div>
        <div><a class="bg-blue-600 px-5 py-1 rounded" href="{{ route('admin.orders') }}" wire:navigate>Orders</a></div>
    </div>
</div>
