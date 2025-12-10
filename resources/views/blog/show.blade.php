<x-layouts.base title="BlogdeBlog" :theme="$blog->theme">
    <section class="flex flex-col mt-6 p-2 w-full max-w-7xl">
        <div class="bg-secondary text-secondary-foreground relative overflow-hidden mb-4 h-80">
            @if ($talks->count() > 0)  
                <a class="relative inset-0 z-10 flex items-end p-8">{{ $talks[0]->title }}</a>
                @if ($talks[0]->image_path != "empty")
                    <img src="{{ $talks[0]->imageUrl()}}" class="absolute inset-0 w-full h-full object-cover img-zoom">
                @endif
            @endif
        </div>
        
        <div class="flex gap-4 mb-6">
            <a class="bg-secondary text-secondary-foreground relative overflow-hidden p-4 flex-1 h-50">
                @if ($talks->count() > 1)
                    <p class="relative z-10">{{ $talks[1]->title }}</p>
                    @if ($talks[1]->image_path != "empty")
                        <img src="{{ $talks[1]->imageUrl()}}" class="absolute inset-0 w-full h-full object-cover img-zoom">
                    @endif
                @endif
            </a>
            <a class="bg-secondary text-secondary-foreground relative overflow-hidden p-4 flex-1 h-50">
                @if ($talks->count() > 2)
                    <p class="relative z-10">{{ $talks[2]->title }}</p>
                    @if ($talks[2]->image_path != "empty")
                        <img src="{{ $talks[2]->imageUrl()}}" class="absolute inset-0 w-full h-full object-cover img-zoom">
                    @endif
                @endif
            </a>
            <a class="bg-secondary text-secondary-foreground relative overflow-hidden p-4 flex-1 h-50">
                @if ($talks->count() > 3)
                    <p class="relative z-10">{{ $talks[3]->title }}</p>
                    @if ($talks[3]->image_path != "empty")
                        <img src="{{ $talks[3]->imageUrl()}}" class="absolute inset-0 w-full h-full object-cover img-zoom">
                    @endif
                @endif
            </a>
            <a class="bg-secondary text-secondary-foreground relative overflow-hidden p-4 flex-1 h-50">
                @if ($talks->count() > 4)
                    <p class="relative z-10">{{ $talks[4]->title }}</p>
                    @if ($talks[4]->image_path != "empty")
                        <img src="{{ $talks[4]->imageUrl()}}" class="absolute inset-0 w-full h-full object-cover img-zoom">
                    @endif
                @endif
            </a>
        </div>
        @if ($talks->count() > 5)
        @foreach ($talks as $talk)
            <a class="bg-secondary text-secondary-foreground relative overflow-hidden p-8 mb-3 h-50 hover:h-fit group">
                <div class="relative z-10">
                    <h2 class="font-semibold text-2xl">{{ $talk->title }}</h2>
                    <p>{{ $talk->description }}</p>
                    <p class="mt-4 whitespace-pre-line text-base/7">{{ $talk->content }}</p>
                </div>
                @if ($talk->image_path != "empty")
                    <img src="{{ $talk->imageUrl() }}" class="absolute inset-0 w-full h-full object-cover group-hover:opacity-35">
                @endif
            </a>
        @endforeach
        @endif
    </section>
    <section>
        
        
    </section>


</x-layouts.base>