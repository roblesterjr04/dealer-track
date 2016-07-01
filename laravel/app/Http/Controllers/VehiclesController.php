<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Vehicle;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class VehiclesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $vehicles = Vehicle::get();
        return view('vehicles', ['title'=>'Vehicle Inventory', 'addnew'=>'Vehicle', 'vehicles'=>$vehicles, 'table'=>'vehicles']);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('record/vehicle', ['table'=>'vehicles', 'title'=>'Vehicles', 'subtitle'=>'Create Vehicle']);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
	        'vin' => 'required|max:17|unique:vehicles',
	    ]);
	    
	    $vin = $request->vin;
	    
	    $vehicle = new Vehicle();
	    $vehicle->vin = $vin;
	    $vehicle->stock_id = $request->stock_id;
	    
	    if (isset($request->api)) {
		    try {
			    $vehicle->save();
			    return json_encode($vehicle);
		    } catch (Illuminate\Database\QueryException $e) {
			    return "{ \"Error\": \"Failed to save vehicle.\"  }";
		    }
	    } else {
		    try {
			    $vehicle->save();
			    return redirect('/vehicles/')->with('message', 'Saved ' . $vin);
		    } catch (Illuminate\Database\QueryException $e) {
			    return redirect('/vehicles/')->with('message', 'Failed to save ' . $vin);
		    }
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
	    $vehicle = Vehicle::findOrFail($id);
	    
	    return view('record/vehicle', ['vehicle'=>$vehicle, 'table'=>'vehicles', 'title'=>'Vehicles', 'subtitle'=>'Edit Vehicle']);
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
	    $properties = ['vin', 'stock_id', 'new'];
        $vehicle = Vehicle::findOrFail($id);
        foreach ($properties as $var) {
	        $vehicle->$var = $request->$var;
        }
        $vehicle->save();
        return redirect('/vehicles/' . $id)->with('message', 'Saved');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $vehicle = Vehicle::findOrFail($id);
        $vehicle->delete();
        
    }
    
}
