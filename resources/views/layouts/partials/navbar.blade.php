<header>
    <nav class="container">
        <div class="logo-container">
            <a href="{{ route('index') }}">
                <img class="logo" src="/assets/img/logo-libloop.png" alt="logo">
            </a>
            <span class="libloop">LibLoop</span>
        </div>
        <div class="links">
            <a href="{{ route('index') }}">Inicio</a>
            <a href="{{ route('explore') }}">Libros</a>
            <a href="#">Contacto</a>
            <div class = "user">
                @if (Auth::check())
                <a href="{{ route('dashboard') }}" class="user-link">{{ Auth::user()->nombre }}</a>
            @else
                <a href="{{ route('login') }}">Iniciar sesión</a>
            @endif
            </div>  
        </div>
    </nav>
</header>

<style>
    .container {
        display: flex;
        flex-direction: row;
        justify-content: space-between;
        align-items: center;
        padding-top: 0.5em;
    }

    .logo-container {
        display: flex;
        align-items: center;
    }

    .logo {
        height: 70px;
        width: 100px;
    }

    .libloop {
        font-family: Verdana, Geneva, Tahoma, sans-serif;
        font-size: 1.5em;
        margin-left: 10px;
        color: #386641;
    }

    .links {
        display: flex;
        flex-direction: row;
    }

    .links a {
        font-family: Verdana, Geneva, Tahoma, sans-serif;
        margin: 0 1em;
        color: #386641; /* Color verde */
        text-decoration: none;
        cursor: pointer;
        transition: color 0.3s ease, transform 0.3s ease;
    }

    .links a:hover {
        color: #BC4749; /* Efecto de zoom */
        transform: scale(1.1); 
    }

    .user-link {
        font-weight: bold; /* Enlace del usuario en negrita */
    }

</style>
