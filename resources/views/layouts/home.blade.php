<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600;700&display=swap">

        <!-- Styles -->
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">

        <!-- Scripts -->
        <script src="{{ asset('js/app.js') }}" defer></script>

        {{-- livewire styles --}}
        @livewireStyles

        {{-- add apline js with livewire --}}
        <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>
    </head>
    <body class="font-sans bg-gray-background text-gray-900 text-sm">
        <header class="flex items-center justify-between px-8 py-4">
            <div class="flex space-x-6">
                <div class="w-1/5">
                    <a href="#">
                        <img src="{{ asset('uploads/logo.PNG') }}" alt="logo"> 
                    </a>
                </div>
                <div class="w-4/5 relative">
                    <input type="search" placeholder="Search..." name="search" class="w-full rounded-xl gb-white border-none px-4 py-2 pl-8" id="">
                    <div class="absolute top-0 flex itmes-center h-full ml-2">
                        <svg class="w-4 text-gray-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                        </svg>
                    </div>
                </div>
            </div>
            






            <div class="flex items-center">
                    <div class="px-6 py-4">

                            <a href="{{ route('login') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">Log in</a>

                                <a href="{{ route('register') }}" class="ml-4 text-sm text-gray-700 dark:text-gray-500 underline">Register</a>

                    </div>

                    <a href="{{ route('login') }}">
                        <img src="http://gravatar.com/avatar/0000000?d=mp" alt="avatar" class="w-10 h-10 rounded-full">
                    </a>
            </div>
        </header>


                    {{ $slot }}


        @livewireScripts
    </body>
</html>
