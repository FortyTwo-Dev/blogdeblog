<x-layouts.base title="BlogdeBlog" :theme="$blog->theme">
    <section class="flex flex-col mt-6 p-2 w-full max-w-7xl">
        <div class="bg-secondary text-secondary-foreground p-8 mb-4 h-80">
            @if ($talks->count() > 0)  
                <a>{{ $talks[0]->title }}</a>
                @if ($talks[0]->image_path != "empty")
                    <img src="{{ $talks[0]->imageUrl()}}">
                @endif
            @endif
        </div>
        
        <div class="flex gap-4 mb-6">
            <a class="bg-secondary text-secondary-foreground p-4 flex-1 h-50">
                @if ($talks->count() > 1)
                    <p>{{ $talks[1]->title }}</p>
                    @if ($talks[1]->image_path != "empty")
                        <img src="{{ $talks[1]->imageUrl()}}">
                    @endif
                @endif
            </a>
            <a class="bg-secondary text-secondary-foreground p-4 flex-1 h-50">
                @if ($talks->count() > 2)
                    <p>{{ $talks[2]->title }}</p>
                    @if ($talks[2]->image_path != "empty")
                        <img src="{{ $talks[2]->imageUrl()}}">
                    @endif
                @endif
            </a>
            <a class="bg-secondary text-secondary-foreground p-4 flex-1 h-50">
                @if ($talks->count() > 3)
                    <p>{{ $talks[3]->title }}</p>
                    @if ($talks[3]->image_path != "empty")
                        <img src="{{ $talks[3]->imageUrl()}}">
                    @endif
                @endif
            </a>
            <a class="bg-secondary text-secondary-foreground p-4 flex-1 h-50">
                @if ($talks->count() > 4)
                    <p>{{ $talks[4]->title }}</p>
                    @if ($talks[4]->image_path != "empty")
                        <img src="{{ $talks[4]->imageUrl()}}">
                    @endif
                @endif
            </a>
        </div>
        @if ($talks->count() > 5)
        @foreach ($talks as $talk)
            <a class="bg-secondary text-secondary-foreground p-8 mb-3 h-50 hover:h-fit overflow-hidden">
                <h2 class="font-semibold text-2xl">{{ $talk->title }}</h2>
                <p>{{ $talk->description }}</p>
                <p class="mt-4 whitespace-pre-line text-base/7">{{ $talk->content }}</p>
                @if ($talk->image_path != "empty")
                    <img src="{{ $talk->imageUrl() }}">
                @endif
            </a>
        @endforeach
        @endif
    </section>
    <section>
        
        
    </section>


</x-layouts.base>