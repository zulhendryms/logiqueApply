<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class UserPost extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'address' => $this->address,
            'email' => $this->email,
            'password' => $this->password,
            'photos' => $this->photos,
            'creditcard_type' => $this->creditcard_type,
            'creditcard_number' => $this->creditcard_number,
            'creditcard_name' => $this->creditcard_name,
            'creditcard_expired' => $this->creditcard_expired,
            'creditcard_cvv' => $this->creditcard_cvv,
        ];
        // return parent::toArray($request);
    }
}
