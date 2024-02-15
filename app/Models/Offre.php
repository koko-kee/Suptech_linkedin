<?php

namespace App\Models;

use App\Models\Demande;
use App\Models\Entreprise;
use App\Models\StatutOffre;
use App\Models\TypeContrat;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Offre extends Model
{
    use HasFactory;

    protected  $guarded = [];

    public static function boot()
    {
        parent::boot();

        self::creating( function ($offre)
        {
            $offre->entreprise()->associates(request()->entreprise);
        });

    }
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
