<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Posts') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="pb-4"><a href="/post/create" class="px-2 py-2 bg-blue-800 text-white hover:bg-blue-500 rounded">Crear post</a></div>
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    @foreach($posts as $post)
                        <div>
                            <a href="/post/{{$post->id}}">
                                {{$post->titulo}} @Autor: {{$post->usuario->name}}
                            </a>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
