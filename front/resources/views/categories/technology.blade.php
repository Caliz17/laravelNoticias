@extends('layouts.app')

@section('title', 'Home')

@section('content')
    <div class="container mx-auto text-center mt-10">
        <h1 class="text-5xl text-white font-bold">Tecnología</h1>
        <div class="container mx-auto px-4">
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4">
                @if (count($news) == 0)
                    <div class="text-white text-2xl font-bold text-center mt-10">
                        No hay noticias para esta categoria
                    </div>
                @endif
                @foreach ($news as $index => $new)
                    <form action="{{ route('news.detail') }}" method="POST" class="news-form">
                        @csrf
                        <input type="hidden" name="newsData" value="{{ json_encode($new) }}">
                        <input type="hidden" name="relatedNews" class="related-news-input" value="">

                        <button type="submit"
                            class="block max-w-sm rounded bg-sky-500 p-2 m-2 overflow-hidden shadow-lg transform transition-transform duration-300 hover:scale-105">
                            <img class="w-full h-48 object-cover" loading="lazy" src="{{ $new['urlToImage'] }}"
                                alt="Card image">
                            <div class="px-4 py-4">
                                <div class="font-bold text-xl mb-2">{{ $new['title'] }}</div>
                                <p class="text-gray-700 text-base description">
                                    {{ $new['description'] }}
                                </p>
                            </div>
                            <div class="px-4 py-2">
                                @if ($new['source']['name'] != null)
                                    <span
                                        class="inline-block bg-blue-200 rounded-full px-3 py-1 text-sm font-semibold text-gray-700 mr-2 mb-2">
                                        {{ $new['source']['name'] }}
                                    </span>
                                @endif
                                <span
                                    class="inline-block bg-violet-500 rounded-full px-3 py-1 text-sm font-semibold text-white mr-2 mb-2">
                                    {{ Date::parse($new['publishedAt'])->diffForHumans() }}
                                </span>
                            </div>
                        </button>
                    </form>
                @endforeach
            </div>
        </div>
    </div>
@endsection
