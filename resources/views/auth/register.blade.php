<x-layouts.auth title="Register">
    <form class="flex flex-col gap-4 p-8 items-center justify-center bg-tertiary" method="POST" action="{{ route('login.store') }}">
        @csrf
        @method('post')

        <section class="inline-flex gap-1 items-center pb-6">
            <x-icon.books class="stroke-2 size-10 stroke-primary" />
            <h1 class="font-semibold text-xl">BlogdeBlog</h1>
        </section>
        
        <section class="flex flex-col gap-2">
            <x-ui.label id="name" :required="true">Username</x-ui.label>
            <x-ui.input variant="primary" id="name" name="name" type="text" />
            @error('name')
            <p class="text-sm text-color-error">{{ $message }}</p>
            @enderror
        </section>
        
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
        
        <section class="flex flex-col gap-2">
            <x-ui.label id="password_confirmation" :required="true">Password Confirmation</x-ui.label>
            <x-ui.input variant="primary" id="password_confirmation" name="password_confirmation" type="password" />
            @error('password_confirmation')
            <p class="text-sm text-color-error">{{ $message }}</p>
            @enderror
        </section>
        
        <section class="pt-6">
            <x-ui.button variant="primary" type="submit">Register</x-ui.button>
        </section>

        <p class="text-xs">You have an account? <a href="{{ route('login') }}" class="underline">Sign in</a></p>
    </form>
</x-layouts.auth>