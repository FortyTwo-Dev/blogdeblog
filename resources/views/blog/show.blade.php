<x-layouts.base title="BlogdeBlog">
    <section class="flex flex-col mt-6 p-2 w-full max-w-7xl">
        <div class="bg-secondary text-secondary-foreground p-8 mb-4 h-80">
            <a>{{ $talks[1]->title }}</a>
        </div>
        
        <div class="flex gap-4 mb-6">
            <a class="bg-secondary text-secondary-foreground p-4 flex-1 h-50">
                <p>{{ $talks[2]->title }}</p>
                <img {{ $talks[2]->imageUrl()}}>
            </a>
            <a class="bg-secondary text-secondary-foreground p-4 flex-1 h-50">
                <p>{{ $talks[3]->title }}</p>
                <img {{ $talks[3]->imageUrl()}}>
            </a>
            <a class="bg-secondary text-secondary-foreground p-4 flex-1 h-50">
                <p>{{ $talks[4]->title }}</p>
                <img {{ $talks[4]->imageUrl()}}>
            </a>
            <a class="bg-secondary text-secondary-foreground p-4 flex-1 h-50">
                <p>{{ $talks[5]->title }}</p>
                <img {{ $talks[5]->imageUrl()}}>
            </a>
        </div>
        @foreach ($talks as $talk)
        <a class="bg-secondary text-secondary-foreground p-8 mb-3 h-50">
            <h2 class="font-semibold text-2xl">{{ $talk->title }}</h2>
            <p>{{ $talk->description }}</p>
            <img {{ $talk->imageUrl()}}>
        </a>
        @endforeach
    </section>
    <section>
        
        
    </section>


</x-layouts.base>