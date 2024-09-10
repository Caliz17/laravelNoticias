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
                    <p class="text-sm text-gray-400 mb-6">Publicado el:
                        {{ \Carbon\Carbon::parse($news['publishedAt'])->format('d M Y') }}</p>
                    <a href="{{ $news['url'] }}" target="_blank" class="text-blue-500 hover:underline">Leer más</a>
                </div>
            </div>
        </div>

        <!-- Botón de retorno -->
        <div class="max-w-6xl mx-auto mt-6">
            <a href="{{ url()->previous() }}"
                class="inline-block px-4 py-2 bg-blue-500 text-white rounded-lg shadow-md hover:bg-blue-600">
                ← Regresar
            </a>
        </div>

        <!-- Noticias sugeridas -->
        <div class="max-w-6xl mx-auto mt-10">
            <h3 class="text-3xl font-bold text-gray-800 mb-6">Noticias Sugeridas</h3>
            @if (empty($suggestions))
                <div class="w-full">
                    <p class="text-sky-800 mt-3 text-base">
                        Para visualizar sugerencias, debes
                        <a href="{{ route('login.index') }}"
                            class="text-success text-xl font-semibold underline">acceder</a>
                        o
                        <a href="{{ route('form.index') }}"
                            class="text-info text-xl font-semibold underline">registrarte</a>
                    </p>
                </div>
            @else
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">

                    @foreach ($suggestions as $suggestion)
                        <form action="{{ route('news.detail') }}" method="POST">
                            @csrf
                            <input type="hidden" name="newsData" value="{{ json_encode($suggestion) }}">
                            <input type="hidden" name="suggestion" value="{{ json_encode($suggestion) }}">
                            <div class="bg-gray-700 p-4 rounded-lg shadow-md">
                                <img class="rounded-lg w-full h-32 object-cover mb-4" src="{{ $suggestion['urlToImage'] }}"
                                    alt="{{ $suggestion['title'] }}">
                                <h4 class="text-xl font-bold text-white mb-2">{{ $suggestion['title'] }}</h4>
                                <button type="submit" class="text-blue-500 hover:underline">Ver más</button>
                            </div>
                        </form>
                    @endforeach

                </div>
            @endif
        </div>
    </div>

    </div>
@endsection
