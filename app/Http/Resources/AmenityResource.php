<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Traits\EncryptionTrait;

class AmenityResource extends JsonResource
{
    use EncryptionTrait;

    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id'=>$this->encrypt($this->id),
            "bedroom"=>$this->bedroom,
            "livingRoom"=>$this->living_room,
            "kitchen"=>$this->kitchen,
            "general"=>$this->general,
            "apartmentId"=>$this->encrypt($this->apartment_id),
            'createdAt'=> $this->created_at,
            'updatedAt' => $this->updated_at
        ];
    }
}
