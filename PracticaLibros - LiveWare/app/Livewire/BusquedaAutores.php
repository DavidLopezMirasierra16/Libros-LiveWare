<?php

namespace App\Livewire;

use App\Models\Autore;
use Livewire\Component;

class BusquedaAutores extends Component
{
    public $busqueda_autores = "";
    public $autores = [];

    public function mount(){
        $this->autores = Autore::all();
    }

    public function buscarAutores(){
        $this->autores = Autore::where('nombre', 'like', '%'.$this->busqueda_autores.'%')->get();
    }

    public function render()
    {
        return view('livewire.busqueda-autores');
    }
}
