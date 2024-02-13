<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Offre extends Model
{
    use HasFactory;

    protected  $guarded = [];

    public function  demandes()
    {
        return $this->hasMany(Demande::class);
    }

    public function contrat()
    {
        return $this->belongsTo(TypeContrat::class);
    }

    public function statut()
    {
        return $this->belongsTo(StatutOffre::class);
    }

    public function  entreprise()
    {
        return $this->belongsTo(Entreprise::class);
    }
}
