<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Entreprise extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function statut() : belongsTo
    {
        return $this->belongsTo(Statut::class);
    }
    
    public function user()
    {
        return $this->belongsTo(User::class);
    }


}
