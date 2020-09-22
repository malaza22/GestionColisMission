<?php

namespace App\Models;

use App\Model\Preparation;
use App\Models\Product;
use App\Models\Packaging;
use Illuminate\Database\Eloquent\Model;

class Parcel extends Model
{
    protected $fillable = [
        'agencies_id', 'name', 'email', 'password',
    ];

    public function preparations(){
        return $this->belongsTo(Preparation::class,'preparations_id');
    }

    public function packagings(){
        return $this->belongsTo(Packaging::class,'packagings_id');
    }
    public function products(){
        return $this->belongsTo(Product::class,'products_id');
    }
    public function getIdAttribute($value)
    {
        return strtoupper($value);
    }
}
