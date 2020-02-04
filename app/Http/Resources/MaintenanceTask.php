<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class MaintenanceTask extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request) {
        return [
            'id' => $this->Id ? $this->Id : $this->id,
            'factoryDeviceId' => $this->FactoryDeviceId,
            'description' => $this->Description,
            'criticality' => $this->Criticality,
            'completedAt' => $this->CompletedAt,
            'completed' => $this->CompletedAt ? true : false,
            'createdAt' => $this->created_at
        ];
    }

    /**
     * Add link to self
     */
    public function with($request) {
        $id = $this->Id ? $this->Id : $this->id;
        $location = '/api/maintenancetasks/' . $id;
        return [
            'links' => [
                'self' => $location
            ]
        ];
    }
}
