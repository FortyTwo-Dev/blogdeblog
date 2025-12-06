<x-layouts.dashboard title="Create Blog">


<main class="w-full h-full bg-background text-foreground flex flex-col gap-4 p-4 items-center justify-center overflow-hidden">

    <section class="container inline-flex justify-end">
        <x-ui.link variant="tertiary" :url="route('dashboard.blog.index')">Back</x-ui.link>
    </section>

    <section class="container">

        <form action="{{ route('blog.store') }}" method="POST" class="flex flex-col gap-8" enctype="multipart/form-data">
            @csrf
            @method('POST')
            <section class="flex flex-col gap-2">
                <x-ui.label id="title" :required="true">Title</x-ui.label>
                <x-ui.input variant="primary" type="text" id="title" name="title" ></x-ui.input>
                @error('title')
                    <p class="text-xs text-destructive">{{ $message }}</p>
                @enderror
            </section>

            <section class="flex flex-col gap-2">
                <x-ui.label id="description" :required="true">Description</x-ui.label>
                <x-ui.input variant="primary" type="text" id="description" name="description" ></x-ui.input>
                @error('description')
                    <p class="text-xs text-destructive">{{ $message }}</p>
                @enderror
            </section>

            <section class="flex flex-col gap-2">
                <x-ui.label id="image" :required="true">Image</x-ui.label>
                <x-ui.input variant="primary" type="file" id="image" name="image_blog" class="content-center"></x-ui.input>
                @error('image_blog')
                    <p class="text-xs text-destructive">{{ $message }}</p>
                @enderror
            </section>

            <x-ui.button variant="primary" type="submit">Create</x-ui.button>

        </form>

    </section>
</main>

</x-layouts.dashboard>