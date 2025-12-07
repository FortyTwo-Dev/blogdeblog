<x-layouts.dashboard title="Edit Talk">

<main class="w-full h-full bg-background text-foreground flex flex-col gap-4 p-4 items-center justify-center overflow-hidden">

    <section class="container inline-flex justify-end">
        <x-ui.link variant="tertiary" :url="route('dashboard.blog.show', $blog)">Back</x-ui.link>
    </section>

    <section class="container">
        <form action="{{ route('dashboard.blog.talk.update', ['blog' => $blog, 'talk' => $talk]) }}" method="POST" class="flex flex-col gap-8" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <section class="flex flex-col gap-2">
                <x-ui.label id="title" :required="true">Title</x-ui.label>
                <x-ui.input variant="primary" type="text" id="title" name="title" value="{{ $talk->title }}"></x-ui.input>
                @error('title')
                    <p class="text-xs text-destructive">{{ $message }}</p>
                @enderror
            </section>

            <section class="flex flex-col gap-2">
                <x-ui.label id="description" :required="true">Description</x-ui.label>
                <x-ui.input variant="primary" type="text" id="description" name="description" value="{{ $talk->description }}"></x-ui.input>
                @error('description')
                    <p class="text-xs text-destructive">{{ $message }}</p>
                @enderror
            </section>

            <section class="flex flex-col gap-2">
                <x-ui.label id="description" :required="true">Content</x-ui.label>
                <x-ui.textarea variant="primary" id="content" name="content">{{ $talk->content }}</x-ui.textarea>
                @error('content')
                    <p class="text-xs text-destructive">{{ $message }}</p>
                @enderror
            </section>

            <section class="flex flex-col gap-2">
                <x-ui.label id="image" :required="true">Image</x-ui.label>
                <x-ui.input variant="primary" type="file" id="image" name="image_talk" class="content-center"></x-ui.input>
                @error('image_talk')
                    <p class="text-xs text-destructive">{{ $message }}</p>
                @enderror
            </section>

            <x-ui.button variant="primary" type="submit">Edit</x-ui.button>

        </form>

    </section>

</main>

</x-layouts.dashboard>
