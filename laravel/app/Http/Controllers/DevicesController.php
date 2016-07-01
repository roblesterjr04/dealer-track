<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Device;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class DevicesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $devices = Device::get();
        return view('devices', ['title'=>'Mobile Devices', 'addnew'=>'Device', 'devices'=>$devices, 'table'=>'devices']);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('record/device', ['table'=>'devices', 'title'=>'Devices', 'subtitle'=>'Create Device']);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $device = new Device();
        $device->user_name = $request->user_name;
        $device->email = $request->email;
        $device->phone = $request->phone;
        try {
		    $device->save(['new'=>1]);
		    return redirect('/devices/')->with('message', 'Saved');
	    } catch (Illuminate\Database\QueryException $e) {
		    return redirect('/devices/')->with('message', 'Failed to save');
	    }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
	    $device = Device::findOrFail($id);
	    return view('record/device', ['table'=>'devices', 'device'=>$device, 'title'=>'Devices', 'subtitle'=>'Edit Device']);
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
	    $device = Device::findOrFail($id);
        $device->user_name = $request->user_name;
        $device->email = $request->email;
        $device->phone = $request->phone;
        try {
		    $device->save();
		    return redirect('/devices/')->with('message', 'Saved');
	    } catch (Illuminate\Database\QueryException $e) {
		    return redirect('/devices/')->with('message', 'Failed to save');
	    }
    }
    
    public function pair(Request $request, $id) {
	    $device = Device::findOrFail($id);
	    $code = $request->code;
	    $uid = $request->uid;
	    $new_guid = $request->new_guid;
	    if ($code == $device->pairing_code && $uid == $device->guid && $device->active === 0) {
		    $device->active = 1;
		    $device->guid = $new_guid;
		    $device->pairing_code = "----";
		    $device->save();
		    $obj = new \stdClass();
		    $obj->message = "Successfully Paired";
		    $obj->device = $device;
		    return response()->json($obj);
	    } else {
		    $obj = new \stdClass();
		    $obj->message = "Invalid code";
		    $obj->device = null;
		    return response()->json($obj)->header("Status", "400, Bad Request");
	    }
    }
    
    public function unpair(Request $request, $id) {
	    $device = Device::findOrFail($id);
	    $device->pairing_code = $device->code();
	    $device->active = 0;
	    $device->guid = $device->uid();
	    $device->save();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $device = Device::findOrFail($id);
        $device->delete();
    }
    
    public function active($id) {
	    $device = Device::findOrFail($id);
	    return response($device->active);
    }
    
}
