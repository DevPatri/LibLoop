<x-app-layout>
    <div class="flex flex-col py-10 items-center justify-center">
        <h1 class="font-semibold text-xl text-gray-800 leading-tight py-10">
            {{ __('Subir Libro') }}
        </h1>
        <div class="flex items-start">
            <form action="{{ route('libros.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <label for="titulo">Título:</label>
                <input type="text" id="titulo" name="titulo" required><br>

                <label for="autor">Autor:</label>
                <input type="text" id="autor" name="autor" required><br>

                <label for="genero">Género:</label>
                <input type="text" id="genero" name="genero" required><br>

                <label for="foto">Foto del libro:</label>
                <input type="file" id="foto" name="foto" required><br>

                <label for="estado">Estado:</label>
                <input type="text" id="estado" name="estado" value="disponible" readonly><br>

                <label for="usuario_id">Usuario ID:</label>
                <input type="number" id="usuario_id" name="usuario_id"><br>

                <button type="submit" class="font-semibold text-xl text-gray-800 leading-tight">Subir</button>
            </form>
        </div>
    </div>
</x-app-layout>
