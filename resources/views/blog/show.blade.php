<x-layouts.base title="BlogdeBlog">
    <section class="flex flex-col mt-6 p-2 w-full max-w-7xl">
        <div class="bg-secondary text-secondary-foreground p-8 mb-4 h-80">
            <a>first</a>
        </div>
        
        <div class="flex gap-4">
            <div class="bg-secondary text-secondary-foreground p-4 flex-1 h-50">
                <a>First</a>
            </div>
            <div class="bg-secondary text-secondary-foreground p-4 flex-1 h-50">
                <a>Second</a>
            </div>
            <div class="bg-secondary text-secondary-foreground p-4 flex-1 h-50">
                <a>Third</a>
            </div>
            <div class="bg-secondary text-secondary-foreground p-4 flex-1 h-50">
                <a>Fourth</a>
            </div>
        </div>
        @foreach ($talks as $talk)
        <a class="bg-secondary text-secondary-foreground p-8 mb-4 h-50">
            <h2 class="font-semibold text-2xl">{{ $talk->title }}</h2>
            <p>{{ $talk->description }}</p>
        </a>
        @endforeach
    </section>
    <section>
        
        
    </section>


</x-layouts.base>