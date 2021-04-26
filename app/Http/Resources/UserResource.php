<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Traits\EncryptionTrait;

class UserResource extends JsonResource
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
            "name"=>$this->name,
            "dateOfBirth"=>$this->dob,
            "email"=>$this->email,
            "isVerified"=>$this->is_verified,
            "registrationStep"=>$this->reg_step,
            "role"=>RoleResource::collection($this->roles),
            'createdAt'=> $this->created_at,
            'updatedAt' => $this->updated_at
        ];
    }
}
