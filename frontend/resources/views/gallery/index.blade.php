<x-app-layout :title="$title">
    <a href="{{ route('gallery.create') }}" class="items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring ring-gray-300 disabled:opacity-25 transition ease-in-out duration-150 capitalize">upload image</a>

    <x-shadow-card class="my-6">
        <div class="grid grid-cols-1 md:grid-col-2 lg:grid-cols-3 gap-4">
            @foreach ($images as $image)
                <div class="flex flex-col bg-white border border-gray-300">
                    <img src="{{ $image->src }}" alt="{{ $image->title }}">
                    <div>
                        <p class="text-center text-gray-500">{{ $image->title }}</p>
                        <p class="text-sm">{{ date('d M, Y', strtotime($image->created_at)) }}</p>
                    </div>
                </div>
            @endforeach

            @empty($images)
                <h4 class="font-bold text-center uppercase">gallery is empty</h4>
            @endempty
        </div>
    </x-shadow-card>
</x-app-layout>