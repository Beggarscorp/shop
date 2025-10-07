<header>
    <div class="bg-blue-900 text-white p-4">
        <div class="flex justify-between w-full">
            <div>Welcome to Admin Panel</div>
            <div class="flex">
                <div class="px-5">
                    @if (session('success'))
                    <div class="text-green-500">{{ session('success') }}</div>
                    @else
                    <div class="text-red-500">{{ session('error') }}</div>
                    @endif
                </div>
                <button class="bg-red-600 px-3 rounded" wire:click="logout">Logout</button>
            </div>
        </div>
    </div>
</header>