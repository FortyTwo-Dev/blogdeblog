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
            <x-ui.link variant="ghost" :url="route('login.store')">Log in</x-ui.link>
            <x-ui.link variant="primary" :url="route('register')">Sign up</x-ui.link>
        </nav>
    </header>
    <section class="w-screen h-screen flex justify-center bg-primary">
        {{ $slot }}
    </section>
    <footer>

    </footer>
</body>
</html>

