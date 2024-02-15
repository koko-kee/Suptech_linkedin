<?php

namespace App\Livewire;
use App\Models\Offre as of;
use Livewire\Component;
use Livewire\WithPagination;

class Offre extends Component
{
    // use WithPagination;
    public string $search = "" ;


    public function render()
    {
        $offres = of::where('libelle','like', "%{$this->search}%")->paginate(5);
        return view('livewire.offre', compact('offres'));
        
    }


}
