<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Agency extends Model
{
    protected $fillable = [
        'name',
        'email',
        'phone_number',
        'location'
    ];

    public function users(){
        return $this->belongsTo(User::class,'users_id');
    }
    public function services(){
        return $this->belongsTo(Service::class,'services_id');
    }
    public function jobs(){
        return $this->belongsTo(Job::class,'jobs_id');
    }
    public function products(){
        return $this->belongsTo(Product::class,'products_id');
    }
    public function prepations(){
        return $this->belongsTo(Prepation::class);
    }
    public function mouvements_temporary(){
        return $this->belongsTo(Mouvement_temporary::class);
    }
    public function mouvements(){
        return $this->belongsTo(Mouvement::class);
    }

    public function getIdAttribute($value)
    {
        return strtoupper($value);
    }
}
