@extends('layouts.app')
@section('title', 'Home')

@section('content')
    <div class="bg-gray-900 h-full text-center text-white  flex flex-col justify-center items-center">
        <img src="https://cdni.iconscout.com/illustration/premium/thumb/error-403-illustration-download-in-svg-png-gif-file-formats--forbidden-client-website-http-web-empty-pages-pack-user-interface-illustrations-6588413.png"
            class="mb-5" alt="403">
        <h2 class="mb-4 text-3xl font-bold">Acceso Denegado</h2>
        <p class="mb-3 text-lg">No tienes permisos para acceder a esta página.</p>
        <p class="text-white mt-3 text-base">
            Para visualizar todas las categorías, por favor
            <a href="{{ route('login.index') }}" class="text-warning font-semibold underline">accede</a>
            o
            <a href="{{ route('login.index') }}" class="text-warning font-semibold underline">regístrate</a>
        </p>
    </div>
@endsection
