
<div class="w-full max-w-md bg-white p-8 rounded-2xl shadow-lg">

    @if (session('success'))
      <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4">
          {{ session('success') }}
      </div>
    @endif
    
    @if (session('error'))
      <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-4">
          {{ session('error') }}
      </div>
    @endif
    
    <h2 class="text-2xl font-bold text-center text-gray-800 mb-6">Login to Your Account</h2>

    <form wire:submit.prevent="login" class="space-y-5">
      <!-- Email -->
      <div>
        <label for="email" class="block text-gray-600 font-medium mb-2">Email</label>
        <input type="email" id="email" wire:model="email" placeholder="example@email.com"
               class="w-full px-4 py-3 border rounded-lg focus:outline-none focus:ring-2 focus:ring-yellow-400 focus:border-transparent">
        @error('email') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
      </div>

      <!-- Password -->
      <div>
        <label for="password" class="block text-gray-600 font-medium mb-2">Password</label>
        <input type="password" id="password" wire:model="password" placeholder="Enter your password"
               class="w-full px-4 py-3 border rounded-lg focus:outline-none focus:ring-2 focus:ring-yellow-400 focus:border-transparent">
        @error('password') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror

        <!-- Forgot Password Link -->
        <div class="text-right mt-2">
          <a href="{{ route('forgot.password') }}" class="text-yellow-500 text-sm hover:underline">Forgot Password?</a>
        </div>
      </div>

      <!-- Submit Button -->
      <div>
        <button type="submit"
            class="w-full bg-yellow-500 text-white font-medium py-3 rounded-lg hover:bg-yellow-600 transition duration-300">
            Login
        </button>
      </div>
    </form>

    <!-- Sign up link -->
    <p class="text-center text-gray-600 mt-5">
      Don't have an account?
      <a href="/signup" class="text-yellow-500 font-medium hover:underline">Sign Up</a>
    </p>
  </div>
