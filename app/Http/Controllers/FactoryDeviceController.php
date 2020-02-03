<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;
use App\FactoryDevice;
use App\Http\Resources\FactoryDevice as FactoryDeviceResource;

class FactoryDeviceController extends Controller {

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        $fds = FactoryDevice::paginate(50);
        return FactoryDeviceResource::collection($fds);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) {
        $fd = $request->isMethod('put') ? 
            FactoryDevice::findOrFail($request->id) : 
            new FactoryDevice;

        $fd->Id = $request->input('id');
        $fd->Name = $request->input('name');
        $fd->Year = $request->input('year');
        $fd->Type = $request->input('type');

        if ($fd->save()) {
            return new FactoryDeviceResource($fd);
            /* return $fd; */
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id) {
        $fd = FactoryDevice::findOrFail($id);
        return new FactoryDeviceResource($fd);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id) {
        $fd = FactoryDevice::findOrFail($id);
        if($fd->delete()) {
            return new FactoryDeviceResource($fd);
        }
    }
}
