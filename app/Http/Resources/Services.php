<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Services extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        //return parent::toArray($request);
        return [
            'id' => $this->id,
            'service_name' => $this->service_name,
            'category' => $this->category,
            'description' => $this->description->NULL,
        ];
    }
}
