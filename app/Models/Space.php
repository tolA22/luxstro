<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Space extends Model
{
    use HasFactory,SoftDeletes;

    protected $fillable = [
        "leisure_spaces","guest_spaces","bedroom_count","bed_count",
        "bathroom_count","bathroom_amenities","apartment_id"
    ];

    public function apartment(){
        return $this->belongsTo("App\Models\ApartmentInfo","apartment_id");
    }
}
