<?php

namespace App\Models;

use App\Models\Parcel;
use Illuminate\Database\Eloquent\Model;

class Packaging extends Model
{
    protected $fillable = [
        'name',
    ];
    public function parcels(){
        return $this->hasMany(Parcel::class,'parcels_id');
    }
    public function getIdAttribute($value)
    {
        return strtoupper($value);
    }
}
