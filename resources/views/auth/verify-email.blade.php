<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Verify Your Email</title>
    @vite('resources/css/app.css') <!-- if you’re using Laravel + Tailwind -->
</head>
<body class="bg-gray-100 flex items-center justify-center min-h-screen">

    <div class="bg-white p-8 rounded-2xl shadow-md w-full max-w-md text-center">
        <h1 class="text-2xl font-bold text-gray-800 mb-4">Verify Your Email Address</h1>

        <p class="text-gray-600 mb-6">
            Before proceeding, please check your email for a verification link.
            If you didn’t receive the email, you can request another one.
        </p>

        @if (session('message'))
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-2 rounded mb-4">
                {{ session('message') }}
            </div>
        @endif

        <form method="POST" action="{{ route('verification.send') }}">
            @csrf
            <button type="submit" 
                class="bg-blue-600 text-white px-6 py-2 rounded-lg hover:bg-blue-700 transition">
                Resend Verification Email
            </button>
        </form>

        <p class="mt-6 text-gray-500 text-sm">
            Once verified, refresh this page or return to your 
            <a href="{{ route('dashboard') }}" class="text-blue-600 font-medium hover:underline">Dashboard</a>.
        </p>
    </div>

</body>
</html>
