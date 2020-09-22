<?php

namespace App\Models;

use App\Models\Mouvement;
use Illuminate\Database\Eloquent\Model;

class Carrier extends Model
{
    public function mouvements(){
        return $this->belongsTo(Mouvement::class,'mouvements_id');
    }

    public function getIdAttribute($value)
    {
        return strtoupper($value);
    }
}
