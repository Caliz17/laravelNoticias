<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'MyApp')</title>
    @vite('resources/css/app.css')
    @livewireStyles
</head>

<body class="flex flex-col min-h-screen bg-gray-50 ">
    <x-navbar />

    <main class="flex-grow">
        @yield('content')
    </main>

    <x-footer />
    @vite('resources/js/app.js')
    @livewireScripts
</body>

</html>
