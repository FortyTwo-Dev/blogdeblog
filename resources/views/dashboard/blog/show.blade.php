<x-layouts.dashboard title="Index">


<main class="w-full h-full bg-background text-foreground flex flex-col gap-4 p-4 items-center justify-center overflow-hidden">

    <section class="container inline-flex justify-between gap-2">
        <h2 class="text-2xl text-secondary font-semibold">{{ $blog->title }}</h2>
        <div class="inline-flex gap-2">
            <x-ui.link variant="secondary" :url="route('dashboard.blog.index')">Back</x-ui.link>
            <x-ui.link variant="secondary" :url="route('dashboard.blog.edit', $blog)">Modify</x-ui.link>
            @if (!$blog->trashed())                    
                <form action="{{ route('dashboard.blog.destroy', $blog) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    
                    <x-ui.button variant="warning" type="submit">Disable</x-ui.button>
                </form>
                @else
                <form action="{{ route('dashboard.blog.restore', $blog) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <x-ui.button variant="success" type="submit">Enable</x-ui.button>
                </form>
            @endif
        </div>
    </section>

    <section class="container flex flex-col items-center gap-2 bg-primary text-primary-foreground p-8">
        <div>
            <h1 class="font-semibold text-3xl">{{$blog->title}}</h1>
            <div class="inline-flex gap-2">
                <p class="text-xl">{{ $blog->description }}</p>
            </div>
            <img class=" w-4xl" src="{{ $blog->imageUrl() }}" alt="{{$blog->slug}}">
        </div>
    </section>

    <section class="container inline-flex justify-between items-center gap-2">
        <h2 class="text-2xl text-secondary font-semibold">Talk</h2>
        <x-ui.link variant="secondary" :url="route('dashboard.blog.talk.create', $blog)">Add</x-ui.link>
    </section>

    @foreach ($talks as $talk)
        <section class="container inline-flex justify-between items-center bg-primary text-primary-foreground p-4">
            <h1 class="font-semibold">{{$talk->title}}</h1>
            <div class="inline-flex gap-2">
                <x-ui.link variant="secondary" url="">See</x-ui.link>
                <x-ui.link variant="secondary" :url="route('dashboard.blog.talk.edit', ['blog' => $blog, 'talk' => $talk])">Modify</x-ui.link>
                <form action="" method="POST">
                    @csrf
                    @method('POST')

                    <x-ui.button variant="warning" type="submit">Disable</x-ui.button>
                </form>
            </div>
        </section>
    @endforeach

</main>

</x-layouts.dashboard>
