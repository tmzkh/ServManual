<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MaintenanceTask extends Model
{
    public function FactoryDevice()
    {
        return $this->belongsTo('App\FactoryDevice', 'FactoryDeviceId', 'Id');
    }
}
