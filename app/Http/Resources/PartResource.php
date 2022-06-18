<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class PartResource extends JsonResource
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
            'serialnumber' => $this->serialnumber,
            'car_id' => $this->car_id,
            'created_at' => $this->created_at->format('Y-m-d H:i:s'),    // display created_at data
            'updated_at' => $this->updated_at->format('Y-m-d H:i:s')     // display updated_at data
        ];
    }
}
