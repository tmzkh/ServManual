<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class FactoryDevice extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->Id ? $this->Id : $this->id,
            'name' => $this->Name,
            'year' => $this->Year,
            'type' => $this->Type,
        ];
    }

    public function with($request)
    {
        $id = $this->Id ? $this->Id : $this->id;
        $location = '/api/factorydevices/' . $id;
        return [
            'location' => $location
        ];
    }
}
