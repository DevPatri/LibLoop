<header>
    <nav class="container">
        <div class="first">
            <img class="logo" src="./assets/img/Logo_without_back.png" alt="logo">
            <h1>LibLoop</h1>
        </div>
        <div class="links">
            <a href="{{ route('index') }}">Inicio</a>
            <a href="#">Intercambio</a>
            <a href="#">Ayuda</a>
            <a href="#">Contacto</a>
        </div>
    </nav>
    <hr>
</header>
{{--  CSS  --}}
<style>
    .container {
        display: flex;
        flex-direction: row;
        justify-content: space-between;

        .first {
            height: 70px;
            display: flex;
            flex-direction: row;
            font-size: 1.5rem;

            .logo {
                max-height: 100%;
                min-width: 90px;
                max-width: 100%;
                margin: 10px 20px 0 20px;
            }

            h1 {
                font-size: clamp(1rem, 4vw, 2rem);
                color: rgb(34, 34, 34);
            }
        }

        .links {
            display: flex;
            flex-direction: row;
            justify-content: flex-end;
            align-items: flex-end;
            width: 100%;
            font-size: clamp(1rem, 2vw, 1.2rem);

            a {
                margin: 0 1em 6px 1em;
                color: rgb(34, 34, 34);
                text-decoration: none;
                cursor: pointer;
            }

            a:last-child {
                margin-right: 0;
            }

        }
    }

    hr {
        border: 0.1em solid rgb(16, 106, 31);
    }
</style>
