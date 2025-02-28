<?php

namespace App\Livewire;

use App\Models\Libro;
use Livewire\Component;

class BusquedaLibros extends Component
{
    public $busqueda = '';
    public $libros = [];
    public $order = '';
    
    /**
     * Se ejecuta antes de que se ejecute todo el componente
     */
    public function mount(){
        $this->libros = Libro::all();
    }

    public function buscarLibros()
    {
        $this->libros = Libro::where('titulo', 'like', "%{$this->busqueda}%")->get();
    }

    public function render()
    {
        return view('livewire.busqueda-libros');
    }
}
