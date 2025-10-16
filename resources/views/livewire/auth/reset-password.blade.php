<form wire:submit.prevent="submit" class="max-w-md mx-auto mt-12 p-6 bg-white rounded-lg shadow-md">
    @if (session()->has('message'))
    <div class="bg-green-100 text-green-700 p-3 rounded mb-5 text-center">
        {{ session('message') }}
    </div>
    @endif

    <div class="mb-4">
        <input
            type="email"
            wire:model="email"
            placeholder="Email"
            required
            class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
        @error('email')
        <span class="text-red-600 text-sm mt-1 block">{{ $message }}</span>
        @enderror
    </div>

    <div class="mb-4">
        <input
            type="password"
            wire:model="password"
            placeholder="New Password"
            required
            class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
        @error('password')
        <span class="text-red-600 text-sm mt-1 block">{{ $message }}</span>
        @enderror
    </div>

    <div class="mb-6">
        <input
            type="password"
            wire:model="password_confirmation"
            placeholder="Confirm Password"
            required
            class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
    </div>

    <button
        type="submit"
        class="w-full bg-blue-600 hover:bg-blue-700 text-white font-semibold py-2 rounded-md transition duration-300">
        Reset Password
    </button>
</form>