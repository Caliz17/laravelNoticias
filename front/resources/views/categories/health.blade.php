@extends('layouts.app')

@section('title', 'Home')

@section('content')
    <div class="container mx-auto text-center mt-10">
        <h1 class="text-5xl text-sky-700 font-bold">Salud</h1>
        <div class="container mx-auto px-4">
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4">
                @if (count($news) == 0)
                    <div class="text-white text-2xl font-bold text-center mt-10">
                        No hay noticias para esta categoria
                    </div>
                @endif
                @foreach ($news as $index => $new)
                    <x-card :route="route('news.detail')" :image="$new['urlToImage']" :title="$new['title']" :description="$new['description']" :source="$new['source']['name'] ?? null"
                        :publishedAt="$new['publishedAt']" :newsData="$new" :relatedNews="$relatedNews ?? ''" />
                @endforeach
            </div>
        </div>
    </div>
@endsection
