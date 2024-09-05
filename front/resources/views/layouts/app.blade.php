<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'MyApp')</title>
    @vite('resources/css/app.css')
</head>
<body class="flex flex-col min-h-screen">
    <x-navbar />
    
    <main class="flex-grow">
        @yield('content')
    </main>
    
    <x-footer />
    @vite('resources/js/app.js')
</body>
</html>
