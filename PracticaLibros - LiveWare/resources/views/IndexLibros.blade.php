@extends('layout.IndexWeb')

@section('title', 'Inicio')
        
@section('contenido')
    <!--COMPONENTE DE NAVEGACION--->
    <livewire:navegacion/>
    <!--COMPONENTE PRINCIPAL-->
    @livewire('busqueda-libros')
@endsection