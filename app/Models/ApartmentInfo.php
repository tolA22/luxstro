<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ApartmentInfo extends Model
{
    use HasFactory,SoftDeletes;

    protected $fillable = [
        "address","city","state","property_type_id","minimum_nights",
        "maximum_nights","check_in_time_from","check_in_time_to",
        "price","same_day_bookings","description","name","user_id"
    ];

    public function propertyType(){
        return $this->belongsTo("App\Models\PropertyType","property_type_id");
    }

    public function user(){
        return $this->belongsTo("App\Models\User","user_id");
    }

    public function propertyGuest(){
        return $this->hasOne("App\Models\PropertyGuest","apartment_id","id");
    }

    public function amenity(){
        return $this->hasOne("App\Models\Amenity","apartment_id","id");
    }

    public function space(){
        return $this->hasOne("App\Models\Space","apartment_id","id");
    }

    public function media(){
        return $this->hasMany("App\Models\Media","apartment_id","id");
    }

}
