<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\FactoryDevice;
use App\MaintenanceTask;
use App\Http\Resources\MaintenanceTask as MaintenanceTaskResource;

class MaintenanceTaskController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($factorydevice = -1) {
        if ($factorydevice == -1) {
            $mts = MaintenanceTask::paginate(50);
            return MaintenanceTaskResource::collection($mts);
        } else {
            $fd = FactoryDevice::find($factorydevice);
            $mts = $fd->MaintenanceTasks::paginate(50);
            return MaintenanceTaskResource::collection($mts);
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) {
        $mt = new MaintenanceTask;

        $mt->FactoryDeviceId = $request->input('factoryDeviceId');
        $mt->Description = $request->input('description');
        $mt->Criticality = $request->input('criticality');

        if ($mt->save()) {
            return new MaintenanceTaskResource($mt);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id) {
        $mt = MaintenanceTask::findOrFail($id);
        return new MaintenanceTaskResource($mt);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id) {
        $mt = MaintenanceTask::findOrFail($id);

        $mt->Id = $request->input('id');
        $mt->FactoryDeviceId = $request->input('factoryDeviceId');
        $mt->Description = $request->input('description');
        $mt->Criticality = $request->input('criticality');
        $mt->Id = $request->input('completedAt');

        if ($mt->save()) {
            return new MaintenanceTaskResource($mt);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id) {
        $mt = MaintenanceTask::findOrFail($id);
        if ($mt->delete()) {
            return new MaintenanceTaskResource($mt);
        }
    }
}
