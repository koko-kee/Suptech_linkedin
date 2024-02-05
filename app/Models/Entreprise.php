<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Entreprise extends Model
{
    use HasFactory;

    public function statut() : belongsTo
    {
        
        return $this->belongsTo(Statut::class);
    }


}
