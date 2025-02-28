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
            <h2>Autores</h2>
            <a href="{{route('formularioCrearAutor')}}" class="text-decoration-none btn btn-dark">Crea un autor</a>
        </div>

        <input type="text" wire:model="busqueda_autores"
            wire:input="buscarAutores"
            placeholder="Buscar autores">
        <button class="btn btn-primary">Buscar</button>

        {{-- Mostrar los autores encontrados por la búsqueda --}}
        <table class="table table-striped-columns mt-3">
            <thead>
                <tr>
                    <th scope="col">Autor</th>
                    <th scope="col">Nº de Libros</th>
                    <th scope="col">Actualizar</th>
                    <th scope="col">Eliminar</th>
                </tr>
            </thead>
                @foreach ($autores as $autor)
                <tbody>
                    <tr>
                        <td>{{$autor->nombre}}</td>
                        <td>{{$autor->libros->count()}}</td>
                        <td>
                            <a href="{{route('formularioEditarAutor', $autor->id)}}" class="text-decoration-none btn btn-warning">Actualizar</a>
                        </td>
                        <td>
                            <form action="{{route('eliminarAutor', $autor->id)}}" method="POST">
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
