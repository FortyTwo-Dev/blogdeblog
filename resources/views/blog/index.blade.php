<x-layouts.base title="Community">
    <section class="flex flex-col mt-6 p-2 w-full max-w-7xl">
        {{-- <div class="bg-secondary text-secondary-foreground p-8 mb-4 h-50">
            <a>Nvidia</a>
        </div>
        <div class="bg-secondary text-secondary-foreground p-8 mb-4 h-50">
            <a>AMD</a>
        </div>
        <div class="bg-secondary text-secondary-foreground p-8 mb-4 h-50">
            <a>Timeo GENNA</a>
        </div>
        <a href="{{ route('blog.show') }}" class="bg-secondary text-secondary-foreground p-8 mb-4 h-50">
            <h2>KFC</h2>
            <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Natus, necessitatibus. Vero nulla labore eveniet vitae officia ipsa excepturi, accusantium reiciendis corporis deserunt, sit itaque nobis optio omnis repellat doloribus laborum!z</p>
        </a> --}}
        @foreach ($blogs as $blog)
            <a href="{{ route('blog.show', $blog->slug) }}" class="bg-secondary text-secondary-foreground p-8 mb-4 h-50">
            <h2>{{ $blog->title }}</h2>
            <p>{{ $blog->description }}</p>
        </a>
        @endforeach
    </section>
</x-layouts.base>