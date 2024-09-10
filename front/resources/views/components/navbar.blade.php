<div class="navbar bg-sky-600 z-50">
    <div class="navbar-start">
        <div class="dropdown">
            <div tabindex="0" role="button" class="btn btn-ghost lg:hidden">
                <i class="fas fa-bars text-xl text-white"></i>
            </div>
            <ul tabindex="0" class="menu menu-sm dropdown-content bg-sky-500 text-white rounded-sm z-[1] mt-1 w-52 shadow">
                <li class="py-3">
                    <a class="block">Categorías</a>
                    <ul class="rounded bg-sky-500 mt-2">
                        <li class="py-3"><a href="/general" class="block"><i class="fas fa-globe"></i> General</a></li>
                        <li class="py-3"><a href="/entertainment" class="block"><i class="fas fa-film"></i> Entretenimiento</a></li>
                        <li class="py-3"><a href="/business" class="block"><i class="fas fa-building"></i> Negocios</a></li>
                        <li class="py-3"><a href="/health" class="block"><i class="fas fa-flask"></i> Salud</a></li>
                        <li class="py-3"><a href="/technology" class="block"><i class="fas fa-laptop"></i> Tecnología</a></li>
                        <li class="py-3"><a href="/sports" class="block"><i class="fas fa-futbol"></i> Deportes</a></li>
                        <li class="py-3"><a href="/science" class="block"><i class="fas fa-flask"></i> Ciencia</a></li>
                    </ul>
                </li>
            </ul>
        </div>
        
        <a class="btn btn-ghost text-white text-xl" href="/">
            <i class="fas fa-newspaper"></i>
            Noticias
        </a>
    </div>
    <div class="navbar-center hidden lg:flex text-white ">
        s
    </div>

    <div class="navbar-end">

        @if (session('api_token'))
            <a href="/logout" class="btn btn-ghost text-sky-200 text-sm">
                <h1 class="text-white text-sm">{{ session('name') }}</h1>
                <i class="fas fa-sign-out-alt"></i>
                Cerrar Sesión
            </a>
        @else
            <a href="/login" class="btn btn-ghost text-white text-sm">
                <i class="fas fa-sign-in-alt"></i>
                Acceder
            </a>
        @endif
    </div>

</div>
