<?php

namespace App\Http\Controllers;

use App\Models\Genero;
use Illuminate\Http\Request;

class GenerosController extends Controller
{
    /**
     * Funcion que nos lleva al index de libros
     */
    public function index(){
        return view('IndexGeneros');
    }

    /**
     * Funcion que nos lleva al formulario de crear un genero
     */
    public function crearFormulario(){
        return view('FormularioCrearGenero');
    }

    /**
     * Funcion que nos crea un genero
     */
    public function crearGenero(Request $datos_crear){
        $new_genero = new Genero();

        $new_genero->genero=$datos_crear->nombre;
        $new_genero->save();

        return redirect('/generos')->with('exito', 'Genero <strong>'.$datos_crear->nombre.'</strong> creado correctaente');
    }

    /**
     * Funcion que nos lleva al formulario de editar un genero
     */
    public function editarFormulario($id){
        $genero = Genero::find($id);

        if(!$genero){
            return redirect('/generos')->with('error', 'No existe el genero <strong>nº'.$id);
        }else{
            return view('FormularioEditarGenero', compact('genero'));
        }

    }

    /**
     * Funcion que nos edita un genero
     */
    public function editarGenero($id, Request $datos_editar){
        $genero_editar = Genero::find($id);

        $genero_editar->genero=$datos_editar->nombre;
        $genero_editar->save();

        return redirect('/generos')->with('exito', 'Genero <strong>'.$datos_editar->nombre.'</strong> editado correctamente');
    }

    /**
     * Funcion que nos elimina un genero
     */
    public function eliminarGenero($id){
        $genero_eliminar = Genero::find($id);

        $libros = $genero_eliminar->libros->count();

        if($libros==0){
            $genero_eliminar->delete();
            return redirect('/generos')->with('exito', 'Genero <strong>nº'.$id.'</strong> eliminado correctamente');
        }else{
            return redirect('/generos')->with('error', 'No se puede eliminar el genero, tiene <strong>'.$libros.'</strong> libro/s asignado/s');
        }

    }

}
