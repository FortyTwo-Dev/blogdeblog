<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>BlogdeBlog - {{ $title }}</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="light-orange">
    <header class="flex items-center justify-between px-6 py-4">
        <x-icon.books class="stroke-2 size-12 stroke-primary"/>
        <nav class="flex items-center gap-4">
            <x-ui.input variant="primary" id="search" name="search" type="search" placeholder="Rechercher..."/>
            <a href="{{ route('login.store') }}" class="px-4 py-2 text-gray-700 hover:text-primary font-medium">Log in</a>
            <a href="{{ route('register') }}" class="px-4 py-2 bg-primary text-white hover:bg-opacity-90 font-medium">Sign up</a>
        </nav>
    </header>
    <section class="w-screen h-screen flex justify-center bg-primary">
        {{ $slot }}
    </section>
    <footer>

    </footer>
</body>
</html>