<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ $post->titulo }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <label>Titulo: {{$post->titulo}}</label>
                    <div>{{$post->contenido}}</div>
                    <label>@Autor: {{$post->usuario->name}}</label>
                    @can('update', $post)
                        <div class="mt-2 py-2">
                            <a href="/post/{{$post->id}}/editar" class="my-2 px-2 py-2 bg-blue-800 text-white hover:bg-blue-500 rounded">Editar</a>
                        </div>
                    @endcan
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
