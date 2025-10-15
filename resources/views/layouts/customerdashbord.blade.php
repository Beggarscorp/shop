<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title ?? 'Beggars Corporation' }}</title>
    <link rel="shortcut icon" href="{{ asset('assets/images/logos/favicon.png') }}" type="image/x-icon">
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">   <!-- Google Fonts Nunito -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.0/css/all.min.css" integrity="sha512-DxV+EoADOkOygM4IR9yXP8Sb2qwgidEmeqAEmDKIOfPRQZOWbXCzLC6vjbZyy0vPisbH2SyW27+ddLVCN+OMzQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    @livewireStyles
</head>
<body class="bg-gray-100">

    {{-- Header --}}
    @livewire('components.header')

    <div class="container mx-auto p-5 m-5 shadow-lg rounded text-gray-600">

        <div class="grid grid-cols-12">

            <div class="col-span-2 border-r-1  bg-gray-200">
                @livewire('components.customerdashboardsidebar')
            </div>
            <div class="col-span-10">
                {{-- Page Content --}}
                <main wire:navigate.persist>
                    {{ $slot }}
                </main>
            </div>
        </div>

    </div>

    {{-- Footer --}}
    @livewire('components.footer')

    @livewireScripts(['alpine' => false, 'navigate' => true])

</body>
</html>