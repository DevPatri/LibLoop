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
    main{
        display: grid;
        grid-template-columns: 1fr 3fr;
        gap: 20px;
    }
    @media (max-width: 830px){
        main{
            grid-template-columns: 1fr;
        }
    }
</style>
