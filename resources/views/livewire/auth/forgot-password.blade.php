<form wire:submit.prevent="submit" class="max-w-md mx-auto p-6 bg-gray-100 rounded-lg shadow-lg">
    @if (session()->has('message'))
        <div class="bg-green-200 text-green-700 p-3 rounded mb-4">
            {{ session('message') }}
        </div>
    @endif
    <div class="mb-4">
        <input type="email" wire:model="email" placeholder="Email" required class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-400 focus:border-transparent">
        @error('email') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
    </div>
    <button type="submit" class="w-full bg-blue-500 hover:bg-blue-600 text-white font-semibold py-2 px-4 rounded-lg transition duration-300">
        Send Reset Link
    </button>
</form>
