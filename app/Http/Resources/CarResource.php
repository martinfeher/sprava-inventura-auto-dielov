<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class CarResource extends JsonResource
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
            'registration_number' => $this->registration_number,
            'is_registered' => $this->is_registered,
            'created_at' => $this->created_at->format('Y-m-d H:i:s'),    // display created_at data
            'updated_at' => $this->updated_at->format('Y-m-d H:i:s')     // display updated_at data
        ];
    }
  
}
