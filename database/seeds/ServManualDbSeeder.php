<?php

use Illuminate\Database\Seeder;

class ServManualDbSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\FactoryDevice::class, 1000)->create()->each(function($fd) {
            factory(App\MaintenanceTask::class, 3)->create(['FactoryDeviceId' => $fd->id]);
        });
    }
}
