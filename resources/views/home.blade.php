<x-layouts.base title="BlogdeBlog">
    <section class="w-screen h-screen content-center space-y-16 py-8">
        <h2 class="text-center font-semibold text-9xl">BlogdeBlog</h2>
        <p class="text-center font-semibold text-3xl">L'endroit où les blogs se racontent…</p>
        <section class="flex gap-2 justify-center">
            <x-ui.link variant="secondary" :url="route('login.store')">Discuter maintenant</x-ui.link>
            <x-ui.link variant="tertiary" :url="route('blog.index')">Voir les blogs</x-ui.link>
    </section>
</x-layouts.base>