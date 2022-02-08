<x-app-layout title="Upload Image">
    <x-shadow-card class="my-6">
        <h4 class="font-bold text-2xl capitalize">upload image</h4>

        <x-auth-session-status class="mb-4" :status="session('status')" />
        <x-auth-validation-errors class="mb-4" :errors="$errors" />

        <form action="{{ route('gallery.store') }}" method="post" enctype="multipart/form-data">
            @csrf

            <div>
                <x-label for="title" :value="__('Title')" />
                <x-input id="title" class="block mt-1 w-full" type="text" name="title" :value="old('title')" placeholder="Image title" required autofocus />
            </div>

            <div class="mt-4">
                <x-label for="uploader" :value="__('Uploader')" />
                <x-input id="uploader" class="block mt-1 w-full" type="text" name="uploader" :value="old('uploader')" placeholder="John Doe" required />
            </div>

            <div class="mt-4">
                <x-label for="image" :value="__('Image')" />
                <x-input type="file" name="image" class="block mt-1 w-full" id="image" accept="image/*" required />
            </div>

            <x-button class="mt-4">upload</x-button>
        </form>
    </x-shadow-card>
</x-app-layout>