<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FactoryDevice extends Model
{
    public function MaintenanceTasks()
    {
        return $this->hasMany('App\MaintenanceTask', 'FactoryDeviceId', 'Id');
    }
}
