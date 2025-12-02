<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Dashboard - {{ $title }}</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>
    <header class="flex items-center justify-between px-6 py-4">
        <div class="text-2xl font-semibold inline-flex items-center gap-2">
            <x-icon.books class="stroke-2 size-12 stroke-primary"/>
            <h1>BlogdeBlog</h1>
        </div>
        <nav class="flex items-center gap-4">
            {{-- <x-ui.input variant="primary" id="search" name="search" type="search" placeholder="Rechercher..."/> --}}
            {{-- <x-ui.link variant="ghost" :url="route('login.store')">Logout</x-ui.link> --}}
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                @method('post')
                <x-ui.button variant="ghost" type="submit">Logout</x-ui.button>
            </form>
            <x-ui.link variant="primary" :url="route('register')">My Account</x-ui.link>
        </nav>
    </header>
    {{ $slot }}
    <footer>
        
    </footer>
</body>
</html>