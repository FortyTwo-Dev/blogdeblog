{{-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login - BlogdeBlog</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body> --}}
    <x-layouts.auth title="Login">
        <form class="flex flex-col gap-4 p-8 items-center justify-center bg-tertiary" method="POST" action="{{ route('login.store') }}">
            @csrf
            @method('post')

            <x-icon.books class="stroke-2 size-10" />
    
            <section class="flex flex-col gap-2">
                <x-ui.label id="email" :required="true">Email</x-ui.label>
                <x-ui.input variant="primary" id="email" name="email" type="text" />
                @error('email')
                    <p class="text-sm text-color-error">{{ $message }}</p>
                @enderror
            </section>
    
            <section class="flex flex-col gap-2">
                <x-ui.label id="password" :required="true">Password</x-ui.label>
                <x-ui.input variant="primary" id="password" name="password" type="password" />
                @error('password')
                    <p class="text-sm text-color-error">{{ $message }}</p>
                @enderror
            </section>
    
            <x-ui.button variant="primary" type="submit">Send</x-ui.button>
        </form>
    </x-layouts.auth>
{{-- </body>
</html> --}}