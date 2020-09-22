<?php

namespace App\Models;

use App\Models\Job;
use App\Models\Agency;
use App\Model\Preparation;
use Illuminate\Database\Eloquent\Model;

class Personal extends Model
{
    protected $fillable = [
        'id','jobs_id', 'lastname', 'firstname', 'email', 'phone_number'
    ];
    public function agencies(){
        return $this->hasMany(Agency::class,'agencies_id');
    }
    public function jobs(){
        return $this->belongsTo(Job::class,'jobs_id');
    }
    public function preparations(){
        return $this->belongsTo(Preparation::class,'preparation_id');
    }
    public function getIdAttribute($value)
    {
        return strtoupper($value);
    }

}
