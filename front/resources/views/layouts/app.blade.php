<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>InfileNews</title>
    <!-- icono pestana -->
    <link rel="icon" href="https://cdn.icon-icons.com/icons2/1603/PNG/512/news-newspaper-media-paper-press-article_108607.png" type="image/x-icon">
    @vite('resources/css/app.css')
    @livewireStyles
</head>

<body class="flex flex-col min-h-screen bg-gray-50">
    <x-navbar />

    <div class="flex flex-grow pt-16"> <!-- Añadido pt-16 para evitar que el contenido se superponga al navbar -->
        <x-sidebar />

        <main class="flex-grow p-4">
            @yield('content')
        </main>
    </div>

    <x-footer />
    @vite('resources/js/app.js')
    @livewireScripts
</body>

</html>
