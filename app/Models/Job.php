<?php

namespace App\Models;

use App\Models\Agency;
use App\Models\Personal;
use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
    protected $fillable = [
        'description',
    ];
    public function personals(){
        return $this->belongsTo(Personal::class,'personals_id');
    }
    public function agencies(){
        return $this->hasMany(Agency::class,'agencies_id');
    }
    public function getIdAttribute($value)
    {
        return strtoupper($value);
    }


}
