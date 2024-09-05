<div class="navbar-end">
    @if ($isLoggedIn)
        <a class="btn">
            <i class="fas fa-sign-out-alt"></i>
            Cerrar Sesion</a>
    @else
        <a class="btn mr-1" href="/login">
            <i class="fas fa-sign-in-alt"></i>
            Acceder</a>
    @endif
</div>
