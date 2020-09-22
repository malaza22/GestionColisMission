<?php

namespace App\Model;

use App\Models\Agency;
use App\Models\Parcel;
use App\Models\Personal;
use Illuminate\Database\Eloquent\Model;

class Preparation extends Model
{
    protected $fillable = [
        'Coursier','agencies_id','personals_id','date_preparation'
    ];

    public function agencies(){
        return $this->belongsTo(Agency::class,'agencies_id');
    }
    public function parcels(){
        return $this->belongsTo(Parcel::class,'parcels_id');
    }
    public function personals(){
        return $this->belongsTo(Personal::class,'personals_id');
    }
    public function getIdAttribute($value)
    {
        return strtoupper($value);
    }
}
