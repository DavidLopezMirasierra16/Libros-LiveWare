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
            <h2>Libros</h2>
            <a href="{{route('fomularioCrearLibro')}}" class="text-decoration-none btn btn-dark">Crea un libro</a>
        </div>

        <input type="text" wire:model="busqueda"
            wire:input="buscarLibros"
            placeholder="Buscar libros">
        <button wire:click="buscarLibros" class="btn btn-primary">Buscar</button>

        {{-- Mostrar los libros encontrados por la búsqueda --}}
        <table class="table table-striped-columns mt-3">
            <thead>
                <tr>
                    <th scope="col">Imagen</th>
                    <th scope="col">Titulo</th>
                    <th scope="col">Autor</th>
                    <th scope="col">Genero</th>
                    <th scope="col">Descripcion</th>
                    <th scope="col">Actualizar</th>
                    <th scope="col">Eliminar</th>
                </tr>
            </thead>
                @foreach ($libros as $libro)
                <tbody>
                    <tr>
                        <td class="col-1"><img src="{{$libro->imagen == null ? asset('img/Image-not-found.png') : asset('storage/' . $libro->imagen)}}" alt="Imagen del libro" class="col-12"></td>
                        <td>{{$libro->titulo}}</td>
                        <td>{{$libro->autore->nombre}}</td>
                        <td>{{$libro->genero->genero}}</td>
                        <td>{{$libro->descripcion == null ? 'No hay descripcion en este libro' : $libro->descripcion}}</td>
                        <td>
                            <a href="{{route('formularioEditarLibro', $libro->id)}}" class="text-decoration-none btn btn-warning">Actualizar</a>
                        </td>
                        <td>
                            <form action="{{route('eliminarLibro', $libro->id)}}" method="POST">
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
