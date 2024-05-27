<!DOCTYPE html>
<html>
<head>
    <title>Lista de Libros</title>
</head>
<body>
    <h1>Lista de Libros</h1>
    @if (session('success'))
        <p>{{ session('success') }}</p>
    @endif
    @foreach ($libros as $libro)
        <div>
            <h2>{{ $libro->titulo }}</h2>
            <p>{{ $libro->autor }}</p>
            <p>{{ $libro->genero }}</p>
            <p>{{ $libro->estado }}</p>
            <img src="{{ url('storage/libros/' . basename($libro->foto_url)) }}" alt="Foto de {{ $libro->titulo }}" style="max-width: 150px;">
        </div>
    @endforeach
</body>
</html>
