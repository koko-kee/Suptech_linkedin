<?php

namespace App\Livewire;
use App\Models\Offre as of;
use Livewire\Component;


class Offre extends Component
{

    public string $search = " " ;


    public function render()
    {
        $offres = of::where('libelle','like', "%{$this->search}%")->get();
        return view('livewire.offre', compact('offres'));
        
    }


}
