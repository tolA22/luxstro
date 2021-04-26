<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Traits\EncryptionTrait;

class RoleResource extends JsonResource
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
            'id' => $this->encrypt($this->id),
            "name" => $this->name,
            'createdAt'=>$this->created_at,
            'updatedAt' => $this->updated_at
        ];
    }
}
