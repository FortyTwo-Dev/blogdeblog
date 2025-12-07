<x-layouts.base title="Community">
    <section class="flex flex-col mt-6 p-2 w-full max-w-7xl">
        @foreach ($blogs as $blog)
            <a href="{{ route('blog.show', $blog->slug) }}" x-data="{ hovered: false }" @mouseenter="hovered = true"
                @mouseleave="hovered = false" class="mb-4 h-50 relative overflow-hidden rounded-lg group cursor-pointer">
                <img src="{{ $blog->imageUrl() }}" alt="{{ $blog->title }}"
                    class="w-full h-full object-cover absolute inset-0 transition-transform duration-300"
                    :class="hovered ? 'scale-110' : 'scale-100'">
                <div class="absolute inset-0 bg-gradient-to-t from-black/60 to-transparent flex flex-col justify-end p-8 transition-opacity duration-300"
                    :class="hovered ? 'opacity-100' : 'opacity-80'">
                    <h2 class="font-semibold text-2xl text-white transform transition-transform duration-300"
                        :class="hovered ? 'translate-y-0' : 'translate-y-2'">
                        {{ $blog->title }}
                    </h2>
                    <p class="text-white/90 transform transition-all duration-300"
                        :class="hovered ? 'translate-y-0 opacity-100' : 'translate-y-2 opacity-0'">
                        {{ $blog->description }}
                    </p>
                </div>
            </a>
        @endforeach
    </section>
</x-layouts.base>
