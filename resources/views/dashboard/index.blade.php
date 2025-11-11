<x-layouts.dashboard title="Index">


<main class="w-full h-full bg-background text-foreground flex flex-col gap-4 p-4 items-center justify-center overflow-hidden">

    <section class="container inline-flex justify-end">
        <x-ui.link variant="secondary" url="">Create</x-ui.link>
    </section>

    @foreach ($blogs as $blog)
        <section class="container inline-flex justify-between items-center bg-primary text-primary-foreground p-4">
            <h1 class="font-semibold">{{$blog->title}} id {{$blog->id}}</h1>
            <div class="inline-flex gap-2">
                <x-ui.link variant="secondary" url="">See</x-ui.link>
                <x-ui.link variant="secondary" url="">Modify</x-ui.link>
                <form action="" method="POST">
                    @csrf
                    @method('POST')
    
                    <x-ui.button variant="info" type="submit">Disable</x-ui.button>
                </form>
            </div>
        </section>
    @endforeach

</main>

</x-layouts.dashboard>

{{-- 

blog index
    -> blog show
        -> talk index
            -> talk show
                -> message

--}}