@extends('layouts.landing')

@section('title', 'LibLoop')

@section('content')
<main>
    <aside>
        @livewire('sidebar')
    </aside>
    <section>
        @livewire('explore-libros')
    </section>
</main>
@endsection

<style>
    main {
        display: grid;
        grid-template-columns: 1fr 4fr; /* Ajusta el tamaño de las columnas, sidebar a 1/5 y sección a 4/5 */
        gap: 20px;
    }

    @media (max-width: 830px) {
        main {
            grid-template-columns: 1fr;
        }
    }
</style>
