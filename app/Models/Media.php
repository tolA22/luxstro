<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Media extends Model
{
    use HasFactory,SoftDeletes;

    protected $fillable = [
        "type","upload_url","apartment_id"
    ];

    public function apartment(){
        return $this->belongsTo("App\Models\ApartmentInfo","apartment_id");
    }
}
