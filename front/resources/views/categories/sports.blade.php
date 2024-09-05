@extends('layouts.app')

@section('title', 'Home')

@section('content')
    <div class="container mx-auto text-center mt-10">
        <h1 class="text-5xl text-white font-bold">Deportes</h1>
        <div class="container mx-auto px-4">
    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4">
        @foreach ($news as $new)
            <x-card image="{{ $new['urlToImage'] }}" title="{{ $new['title'] }}" description="{{ $new['description'] }}"
                loading="lazy">
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
            </x-card>
        @endforeach
    </div>
</div>

    </div>
@endsection
