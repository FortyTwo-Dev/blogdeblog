<x-layouts.base title="BlogdeBlog">
    <section class="flex flex-col mt-6 p-2 w-full h-full max-w-7xl">
        <div class="bg-secondary text-secondary-foreground p-8 mb-6 min-h-80">
            <a>grand</a>
        </div>
        
        <div class="flex gap-4 mb-60">
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
        
        <div class="flex gap-6">
            <div class="flex-1 flex flex-col gap-4">
                @foreach ($talks as $talk)
                <a class="bg-secondary text-secondary-foreground p-8 h-25 block">
                    <h2 class="font-semibold text-2xl">{{ $talk->title }}</h2>
                    <p>{{ $talk->description }}</p>
                </a>
                @endforeach
            </div>
            
            <div class="w-80 flex flex-col gap-4">
                <x-ui.link variant="secondary" :url="route('dashboard.blog.index')">Start discussion</x-ui.link> 

                <x-ui.link variant="secondary" :url="route('dashboard.blog.index')">Start discussion</x-ui.link> 


                {{-- changer la route  --}}
                
            </div>
        </div>
    </section>


</x-layouts.base>