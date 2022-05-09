<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\MicrowaveSettings;
use App\Http\Resources\MicrowaveResource;
use App\Http\Requests\MicrowaveRequest;
use App\Exceptions\MicrowaveNotFoundException;

class MicrowaveController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return MicrowaveResource::collection(MicrowaveSettings::all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $create_microwave = MicrowaveSettings::create($request->all());
        return new MicrowaveResource(MicrowaveSettings::find($create_microwave->id));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        try {
            $microwave = new MicrowaveResource(MicrowaveSettings::findOrFail($id));
            
            /* if you can't connect to database, response looks like this

            $microwave = '{
                "data": {
                "id": 1,
                "name": "Samsung",
                "status": "off",
                "program": "meat",
                "door": "close",
                "power": 600,
                "timer": 180 
                }
            }';
            */
            
        } catch (\Exception $exception) {
            throw new MicrowaveNotFoundException();
        } 
        return $microwave;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        try {
            $microSet = MicrowaveSettings::findOrFail($id);
        } catch (\Exception $exception) {
            throw new MicrowaveNotFoundException();
        } 
        if($request->status === 'on'){
            if($microSet->door === 'open'){
                return 'ERROR: the microwave cannot operate with the door open, close the door';
            }if($microSet->power < 1){
                return 'ERROR: set power to get started';
            }if($microSet->timer < 1){
                return 'ERROR: set timer to get started';
            }
        }
        if($request->power < 0){
            return 'ERROR: power cannot be less than zero, set power > 0';
        }
        if($request->timer < 0){
            return 'ERROR: timer cannot be less than zero, set timer > 0';
        }
        $microSet->update($request->all());
        /* if you can't connect to database, response looks like this
            
            $microSet = '{
                "data": {
                "id": 1,
                "name": "Samsung",
                "status": "off",
                "program": "meat",
                "door": "close",
                "power": 600,
                "timer": 180 
                }
            }';
            */
        return new MicrowaveResource($microSet);
       
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            $microSet = MicrowaveSettings::findOrFail($id);
        } catch (\Exception $exception) {
            throw new MicrowaveNotFoundException();
        } 
        if($microSet->delete()){
            return "deleted";
        }
    }
}
