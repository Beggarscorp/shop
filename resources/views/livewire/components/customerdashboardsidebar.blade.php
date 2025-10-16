<div class="space-y-5 p-5">
    <div><a class="hover:bg-gray-300 font-semibold transition duration-500 ease-out px-3 py-2 rounded" wire:navigate href="{{ route('dashboard') }}">Orders</a></div>
    <div><a class="hover:bg-gray-300 font-semibold transition duration-500 ease-out px-3 py-2 rounded" wire:navigate href="{{ route('dashboard') }}">Address</a></div>
    <div><a class="hover:bg-gray-300 font-semibold transition duration-500 ease-out px-3 py-2 rounded" wire:navigate href="{{ route('dashboard') }}">Customer Details</a></div>
    <div><a class="hover:bg-gray-300 font-semibold text-red-400 transition duration-500 ease-out px-3 py-2 rounded cursor-pointer" wire:click="logout">Logout</a></div>
</div>