<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login - BlogdeBlog</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>
    <form class="flex flex-col gap-4 items-center justify-center" method="POST" action="{{ route('login.store') }}">
        @csrf
        @method('post')

        <label for="email">email</label>
        <input class="border" type="text" name="email" id="email">
        @error('email')
            <p class="text-sm text-color-error">{{ $message }}</p>
        @enderror

        <label for="password">password</label>
        <input class="border" type="password" name="password" id="password">
        @error('password')
            <p class="text-sm text-color-error">{{ $message }}</p>
        @enderror

        <button type="submit">Send</button>
    </form>
</body>
</html>