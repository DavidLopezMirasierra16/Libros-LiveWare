<?php

namespace App\Http\Controllers;

use App\Models\Autore;
use Illuminate\Http\Request;

class AutoresController extends Controller
{
    /**
     * Funcion que nos lleva a la pagina de autores
     */
    public function index(){
        return view('IndexAutores');
    }

    /**
     * Funcion que nos lleva al formulario
     */
    public function crearFormulario(){
        return view('FormularioCrearAutor');
    }

    /**
     * Funcion que nos crea un autor 
     */
    public function crearAutor(Request $datos_crear){
        $new_autor = new Autore();

        $new_autor->nombre=$datos_crear->nombre;
        $new_autor->save();

        return redirect('/autores')->with('exito', 'Autor <strong>'.$datos_crear->nombre.'</strong> creado correctamente');
    }

    /**
     * Funcion que nos lleva al formulario de editar autor
     */
    public function editarFormulario($id){
        $autor = Autore::find($id);

        return view('FormularioEditarAutor', compact('autor'));
    }

    /**
     * Funcion que nos edita un autor
     */
    public function editarAutor($id, Request $datos_editar){
        $autor_editar = Autore::find($id);

        $autor_editar->nombre=$datos_editar->nombre;
        $autor_editar->save();

        return redirect('/autores')->with('exito', 'Autor <strong>'.$datos_editar->nombre.'</strong> editado correctamente');
    }

    /**
     * Funcion que nos elimina un autor
     */
    public function eliminarAutor($id){
        $autor_eliminar = Autore::find($id);

        $libros = $autor_eliminar->libros->count();

        if($libros==0){
            $autor_eliminar->delete();
            return redirect('/autores')->with('exito', 'Autor <strong>'.$autor_eliminar->nombre.'</strong> eliminado correctamente');
        }else{
            return redirect('/autores')->with('error', 'No se puede eliminar el autor, tiene <strong>'.$libros.'</strong> libro/s asignado/s');
        }

    }

}
