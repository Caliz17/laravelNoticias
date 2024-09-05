<div class="navbar bg-sky-600 z-50">
    <div class="navbar-start">
        <div class="dropdown">
            <div tabindex="0" role="button" class="btn btn-ghost lg:hidden">
                <i class="fas fa-bars text-xl text-white"></i>
            </div>
            <ul tabindex="0"
                class="menu menu-sm dropdown-content bg-sky-500 text-white rounded-box z-[1] mt-1 w-52  shadow">
                <li>
                    <a>Categorias</a>
                    <ul class="rounded bg-sky-500">
                        <li><a href="/general"><i class="fas fa-globe"></i> General</a></li>
                        <li><a href="/entertainment"><i class="fas fa-film"></i> Entretenimiento</a></li>
                        <li><a href="/business"><i class="fas fa-building"></i> Negocios</a></li>
                        <li><a href="/health"><i class="fas fa-flask"></i> Salud </a></li>
                        <li><a href="/technology"><i class="fas fa-laptop"></i> Tecnología</a></li>
                        <li><a href="/sports"><i class="fas fa-futbol"></i> Deportes</a></li>
                        <li><a href="/science"><i class="fas fa-flask"></i> Ciencia</a></li>
                    </ul>
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
        <ul class="menu menu-horizontal px-1">
            <li>
                <details>
                    <summary>
                        <i class="fas fa-folder"></i>
                        Categorias
                    </summary>
                    <ul class="rounded bg-sky-500">
                        <li><a href="/"><i class="fas fa-globe"></i> General</a></li>
                        <li><a href="/news/entertainment"><i class="fas fa-film"></i> Entretenimiento</a></li>
                        <li><a href="/news/business"><i class="fas fa-building"></i> Negocios</a></li>
                        <li><a href="/news/health"><i class="fas fa-flask"></i> Salud </a></li>
                        <li><a href="/news/technology"><i class="fas fa-laptop"></i> Tecnología</a></li>
                        <li><a href="/news/sports"><i class="fas fa-futbol"></i> Deportes</a></li>
                        <li><a href="/news/science"><i class="fas fa-flask"></i> Ciencia</a></li>
                    </ul>
                </details>
            </li>
        </ul>
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
