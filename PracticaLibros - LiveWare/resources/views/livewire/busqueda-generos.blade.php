<div>
    @if (session('error'))
        {{-- <div class="alert alert-danger mt-4">{{ session('error') }}</div> --}}
        <div class="alert alert-danger mt-4">{!! session('error') !!}</div>
    @endif
    @if (session('exito'))
        {{-- <div class="alert alert-danger mt-4">{{ session('error') }}</div> --}}
        <div class="alert alert-success mt-4">{!! session('exito') !!}</div>
    @endif

    <section class="mt-3">
        <div class="mb-4">
            <h2>Generos</h2>
            <a href="{{route('fomularioCrearGenero')}}" class="text-decoration-none btn btn-dark">Crea un genero</a>
        </div>

        <input type="text" wire:model="busqueda_generos"
            wire:input="buscarGeneros"
            placeholder="Buscar generos">
        <button class="btn btn-primary">Buscar</button>

        {{-- Mostrar los generos encontrados por la búsqueda --}}
        <table class="table table-striped-columns mt-3">
            <thead>
                <tr>
                    <th scope="col">Genero</th>
                    <th scope="col">Nº de libros</th>
                    <th scope="col">Actualizar</th>
                    <th scope="col">Eliminar</th>
                </tr>
            </thead>
                @foreach ($generos as $genero)
                <tbody>
                    <tr>
                        <td>{{$genero->genero}}</td>
                        <td>{{$genero->libros->count()}}</td>
                        <td>
                            <a href="{{route('formularioEditarGenero', $genero->id)}}" class="text-decoration-none btn btn-warning">Actualizar</a>
                        </td>
                        <td>
                            <form action="{{route('eliminarGenero', $genero->id)}}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger">Eliminar</button>
                            </form>
                        </td>
                    </tr>
                </tbody>
                @endforeach
        </table>

    </section>

</div>
