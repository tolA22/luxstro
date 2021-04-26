<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Amenity extends Model
{
    use HasFactory,SoftDeletes;


    protected $fillable = [
        "bedroom","living_room","kitchen","general","apartment_id"
    ];

    public function apartment(){
        return $this->belongsTo("App\Models\ApartmentInfo","apartment_id");
    }
}
