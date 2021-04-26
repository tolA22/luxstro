<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PropertyType extends Model
{
    use HasFactory,SoftDeletes;

    protected $fillable = [
        "name","description","created_by"
    ];


    public function apartments(){
        return $this->hasMany("App\Models\ApartmentInfo","property_type_id","id");
    }
}
