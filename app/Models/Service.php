<?php

namespace App\Models;

use App\Models\Agency;
use App\Models\Mouvement;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    protected $fillable = [
        'name',
    ];
    public function mouvements(){
        return $this->belongsTo(Mouvement::class,'mouvements_id');
    }
    public function mouvements_temporary(){
        return $this->belongsTo(Mouvement_temporary::class);
    }
    public function agencies(){
        return $this->hasMany(Agency::class,'agencies_id');
    }
    public function getIdAttribute($value)
    {
        return strtoupper($value);
    }
}
