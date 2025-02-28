<?php

namespace App\Http\Controllers;

use App\Models\Autore;
use App\Models\Genero;
use App\Models\Libro;
use Illuminate\Http\Request;

class LibrosController extends Controller
{
    /**
     * Funcion que nos lleva al index de libros
     */
    public function index()
    {
        return view('IndexLibros');
    }

    /**
     * Funcion que nos dirige al formulario de crear
     */
    public function crearFormulario()
    {
        $autores = Autore::all();
        $generos = Genero::all();

        return view('FormularioCrearLibro', compact('autores', 'generos'));
    }

    /**
     * Funcion que nos crea un libro
     */
    public function crearLibro(Request $datos_crear)
    {
        $new_libro = new Libro();

        if ($datos_crear->hasFile('imagen')) {
            $path = $datos_crear->file('imagen')->store('libros', 'public');

            $new_libro->titulo = $datos_crear->titulo;
            $new_libro->descripcion = $datos_crear->descripcion;
            $new_libro->imagen = $path;
            $new_libro->autor_id = $datos_crear->autores;
            $new_libro->genero_id = $datos_crear->generos;
            $new_libro->save();

            return redirect('/libros')->with('exito', 'Libro "' . $datos_crear->titulo . '" creado correctamente');
        }
    }

    /**
     * Funcion que nos dirige al formulario de editar
     */
    public function editarFormulario($id)
    {
        $libro = Libro::find($id);
        $autores = Autore::all();
        $generos = Genero::all();

        if (!$libro) {
            return redirect('/libros')->with('error', 'No existe el libro nº ' . $id);
        } else {
            return view('FormularioEditarLibro', compact('libro', 'autores', 'generos'));
        }
    }

    /**
     * Funcion que nos edita un libro
     */
    public function editarLibro($id, Request $datos_editar)
    {
        $libro_editar = Libro::find($id);

        if ($datos_editar->hasFile('imagen')) {
            $path = $datos_editar->file('imagen')->store('libros', 'public');

            $libro_editar->titulo = $datos_editar->titulo;
            $libro_editar->descripcion = $datos_editar->descripcion;
            $libro_editar->imagen = $path;
            $libro_editar->autor_id = $datos_editar->autores;
            $libro_editar->genero_id = $datos_editar->generos;
            $libro_editar->save();

            return redirect('/libros')->with('exito', 'Libro <strong>' . $datos_editar->titulo . '</strong> editado correctamente');
        }
    }

    /**
     * Funcion que nos elimina un libro
     */
    public function eliminarLibro($id)
    {
        $libro_eliminar = Libro::find($id);

        $libro_eliminar->delete();
        return redirect('/libros')->with('exito', 'Libro <strong>nº' . $id . '</strong> eliminado correctamente');
    }

    public function indexWeb()
    {
        return view('IndexWeb');
    }
}
