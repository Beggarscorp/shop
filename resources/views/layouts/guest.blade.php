<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>@yield('title', 'Default Title')</title>
    
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @livewireStyles
</head>
<body class="bg-gray-100 font-sans flex items-center justify-center min-h-screen">
    
      <div 
        x-data="{ show: false, message: '' }" 
        x-on:show-toast.window="show = true; message = $event.detail.message; setTimeout(() => show = false, 3000)" 
        x-show="show" 
        x-transition 
        class="fixed top-5 right-5 bg-green-600 text-white px-5 py-3 rounded-lg shadow-lg z-10">
        <span x-text="message"></span>
      </div>

    {{ $slot }}
    @livewireScripts
</body>
</html>
