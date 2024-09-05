@extends('layouts.app')

@section('title', 'Detalle de Noticia')

@section('content')
    <div class="container mx-auto mt-10">
       
        <!-- Detalles de la noticia -->
        <div class="max-w-6xl mx-auto bg-gray-800 p-6 rounded-lg shadow-lg">
            <div class="flex flex-col items-center">
                <!-- Imagen de la noticia -->
                <div class="w-full mb-6">
                    <img class="rounded-lg shadow-md w-full h-auto" src="{{ $news['urlToImage'] }}" alt="{{ $news['title'] }}">
                </div>

                <!-- Detalles de la noticia -->
                <div class="w-full text-white">
                    <h2 class="text-3xl font-bold mb-4">{{ $news['title'] }}</h2>
                    <p class="text-gray-400 mb-2">Por: {{ $news['author'] }}</p>
                    <p class="mb-6">{{ $news['description'] }}</p>
                    <p class="text-sm text-gray-400 mb-6">Publicado el: {{ \Carbon\Carbon::parse($news['publishedAt'])->format('d M Y') }}</p>
                    <a href="{{ $news['url'] }}" target="_blank" class="text-blue-500 hover:underline">Leer más</a>
                </div>
            </div>
        </div>

        <!-- Noticias Similares -->
        @if($relatedNews && count($relatedNews) > 0)
            <div class="mt-10 max-w-6xl mx-auto">
                <h3 class="text-2xl font-bold mb-4 text-white">Noticias Similares</h3>
                <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4">
                    @foreach ($relatedNews as $related)
                        <a href="{{ route('news.detail') }}" class="block max-w-sm rounded bg-gray-700 p-2 m-2 overflow-hidden shadow-lg transform transition-transform duration-300 hover:scale-105">
                            <img class="w-full h-48 object-cover" loading="lazy" src="{{ $related['urlToImage'] }}" alt="Card image">
                            <div class="px-4 py-4">
                                <div class="font-bold text-xl mb-2">{{ $related['title'] }}</div>
                                <p class="text-gray-400 text-base">
                                    {{ $related['description'] }}
                                </p>
                            </div>
                        </a>
                    @endforeach
                </div>
            </div>
        @endif
    </div>
@endsection
