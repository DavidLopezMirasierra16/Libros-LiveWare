@extends('layout.Formulario')

@section('title', 'Editar autor')
    
@section('contenido')
    
    <div class="col-9 m-auto">
        <h3 class="text-center">Crea un autor</h3>
        <div class="col-5 m-auto">
            <form action="{{route('editarAutor', $autor->id)}}" method="POST">
                @csrf
                @method('PUT')
                <div class="mb-3">
                    <label for="" class="form-label fw-bold">Nombre</label>
                    <input type="text" class="form-control" id="nombre" name="nombre" value="{{$autor->nombre}}">
                </div>
                <button type="submit" class="btn btn-success">Editar</button>
            </form>
        </div>
        <div class="mt-4 text-center">
            <a href="{{route('indexAutores')}}" class="btn btn-primary">Volver</a>
        </div>
    </div>

@endsection