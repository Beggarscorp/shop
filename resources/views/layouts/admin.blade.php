<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>{{ $title ?? 'Admin Panel' }}</title>
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">   <!-- Google Fonts Nunito -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.0/css/all.min.css" integrity="sha512-DxV+EoADOkOygM4IR9yXP8Sb2qwgidEmeqAEmDKIOfPRQZOWbXCzLC6vjbZyy0vPisbH2SyW27+ddLVCN+OMzQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    @livewireStyles
</head>
<body class="flex font-nunito bg-gray-100 h-screen overflow-hidden">

    {{-- Sidebar --}}
    <div class="">Sidebar</div>

    {{-- Admin Content --}}
    <main class="flex-1 p-6 overflow-y-scroll">
        {{ $slot }}
    </main>

    @livewireScripts
</body>
</html>