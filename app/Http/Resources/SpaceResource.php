<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Traits\EncryptionTrait;

class SpaceResource extends JsonResource
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
            "leisureSpaces"=>$this->leisure_spaces,
            "guestSpaces"=>$this->guest_spaces,
            "bedroomCount"=>$this->bedroom_count,
            "bedCount"=>$this->bed_count,
            "bathroomCount"=>$this->bathroom_count,
            "bathroomAmenities"=>$this->bathroom_amenities,
            'createdAt'=> $this->created_at,
            'updatedAt' => $this->updated_at
        ];
    }
}
