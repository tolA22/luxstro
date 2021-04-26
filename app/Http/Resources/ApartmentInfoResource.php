<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Traits\EncryptionTrait;

class ApartmentInfoResource extends JsonResource
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
            "address"=>$this->address,
            "city"=>$this->city,
            "state"=>$this->state,
            "mininumNights"=>$this->minimum_nights,
            "maximumNights"=>$this->maximum_nights,
            "checkInTimeFrom"=>$this->check_in_time_from,
            "checkInTimeTo"=>$this->check_in_time_to,
            "price"=>$this->price,
            "sameDayBookings"=>$this->same_day_bookings,
            "propertyType"=>new PropertyTypeResource($this->propertyType),
            "description"=>$this->description,
            "name"=>$this->name,
            "user"=>new UserResource($this->user),
            "amenity"=>new AmenityResource($this->amenity),
            "propertyGuest"=> new PropertyGuestResource($this->propertyGuest),
            "space"=>new SpaceResource($this->space),
            "media"=>MediaResource::collection($this->media),
            'createdAt'=> $this->created_at,
            'updatedAt' => $this->updated_at
        ];
    }
}
