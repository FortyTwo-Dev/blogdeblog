<x-layouts.dashboard title="Index">


<main class="w-full h-full bg-background text-foreground flex flex-col gap-4 p-4 items-center justify-center overflow-hidden">

    <section class="container inline-flex justify-between gap-2">
        <h2 class="text-2xl text-secondary font-semibold">Blogs</h2>
        <div class="inline-flex gap-2">
            <x-ui.link variant="secondary" :url="route('dashboard.blog.create')">Create</x-ui.link>
        </div>
    </section>

    @foreach ($blogs as $blog)
        <section class="container inline-flex justify-between items-center bg-primary text-primary-foreground p-4">
            <h1 class="font-semibold">{{$blog->title}}</h1>
            <div class="inline-flex gap-2">
                <x-ui.link variant="secondary" :url="route('dashboard.blog.show', $blog)">See</x-ui.link>
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
    @endforeach

</main>

</x-layouts.dashboard>
