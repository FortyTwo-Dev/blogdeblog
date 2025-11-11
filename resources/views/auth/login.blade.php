<x-layouts.auth title="Login">
    <form class="flex flex-col gap-4 p-8 items-center justify-center bg-tertiary rounded-card" method="POST" action="{{ route('login.store') }}">
        @csrf
        @method('post')
        
        <section class="inline-flex gap-1 items-center pb-6">
            <x-icon.books class="stroke-2 size-10 stroke-primary" />
            <h1 class="font-semibold text-xl">BlogdeBlog</h1>
        </section>
        
        <section class="flex flex-col gap-2">
            <x-ui.label id="email" :required="true">Email</x-ui.label>
            <x-ui.input variant="primary" id="email" name="email" type="text" />
            @error('email')
            <p class="text-xs text-destructive">{{ $message }}</p>
            @enderror
        </section>
        
        <section class="flex flex-col gap-2">
            <x-ui.label id="password" :required="true">Password</x-ui.label>
            <x-ui.input variant="primary" id="password" name="password" type="password" />
            @error('password')
            <p class="text-xs text-destructive">{{ $message }}</p>
            @enderror
        </section>
        
        <section class="pt-6">
            <x-ui.button variant="primary" type="submit">Login</x-ui.button>
        </section>
        
        <p class="text-xs">Don't have an account? <a href="{{ route('register') }}" class="underline">Sign up</a></p>
    </form>
</x-layouts.auth>