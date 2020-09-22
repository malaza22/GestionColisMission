<?php

namespace App\Models;

use App\Models\Agency;
use App\Models\Parcel;
use App\Models\Carrier;
use App\Models\Service;
use App\Models\Personal;
use Illuminate\Database\Eloquent\Model;

class Mouvement extends Model
{
    public function agenciesdesti(){
        return $this->belongsTo(Agency::class,'agenciesdesti_id');
    }
    public function agenciesexpe(){
        return $this->belongsTo(Agency::class,'agenciesexpe_id');
    }
    public function preparations(){
        return $this->belongsTo(Preparation::class,'preparations_id');
    }
    public function services(){
        return $this->belongsTo(Service::class,'services_id');
    }
    public function carriers(){
        return $this->belongsTo(Carrier::class,'carriers_id');
    }
    public function personals(){
        return $this->belongsTo(Personal::class,'personals_id');
    }
    public function getIdAttribute($value)
    {
        return strtoupper($value);
    }

}
