<?php

namespace App\Livewire;

use App\Models\Genero;
use Livewire\Component;

class BusquedaGeneros extends Component
{
    public $busqueda_generos = '';
    public $generos = [];

    public function mount(){
        $this->generos = Genero::all();
    }

    public function buscarGeneros(){
        $this->generos = Genero::where('genero', 'like', '%'.$this->busqueda_generos.'%')->get();
    }

    public function render()
    {
        return view('livewire.busqueda-generos');
    }
}
