<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PropertyGuest extends Model
{
    use HasFactory,SoftDeletes;

    protected $fillable = [
        "instructions","additional_details","apartment_id","maximum_guests"
    ];

    public function apartment(){
        return $this->belongsTo("App\Models\ApartmentInfo","apartment_id");
    }
}
