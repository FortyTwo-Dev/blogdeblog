<!DOCTYPE html>
<html class="{{ $theme ?? "base" }}" lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>BlogdeBlog - {{ $title }}</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>
    <header class="bg-background text-foreground flex items-center justify-between px-6 py-4">
        <div class="text-2xl font-semibold inline-flex items-center gap-2">
            <x-icon.books class="stroke-2 size-12 stroke-primary"/>
            <h1>BlogdeBlog</h1>
        </div>
        <nav class="flex items-center gap-4">
            <form action="{{ route('blog.search') }}" method="GET">
                <x-ui.input variant="primary" id="search" name="search" type="search" placeholder="Research blog..." value="{{ request('search', '') }}"/>
            </form>
            @auth
            <x-ui.link variant="ghost" :url="route('dashboard.blog.index')">Dashboard</x-ui.link>
            <x-ui.link variant="primary" :url="route('register')">My Account</x-ui.link> 
            @endauth
            @guest
            <x-ui.link variant="ghost" :url="route('login.store')">Log in</x-ui.link>
            <x-ui.link variant="primary" :url="route('register')">Sign up</x-ui.link>
            @endguest
        </nav>
    </header>
    <main class="min-w-screen min-h-screen flex flex-col items-center justify-center bg-primary">
        {{ $slot }}
    </main>
    <footer class="bg-background text-foreground w-screen flex items-center justify-center px-6 py-4">
        <p>Blogdeblog by <a href="https://github.com/FortyTwo-Dev" class="underline">Fortytwo-Dev</a> and <a href="https://github.com/0jikuji0" class="underline">jikuji</a></p>
    </footer>
</body>
</html>

