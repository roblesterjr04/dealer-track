<?php

namespace App\Http\Controllers;

define('API_KEY', '3w75b8yv4t65sjsn36uwx6jy');

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
	    $key = API_KEY;
	    $url = "https://api.edmunds.com/api/vehicle/v2/vins/$vin?fmt=json&api_key=$key";
	    $data = file_get_contents($url);
	    var_dump($data);
	    exit;
	    $vehicle = new Vehicle();
	    $vehicle->vin = $request->vin;
	    try {
		    $vehicle->save();
		    return redirect('/vehicles/')->with('message', 'Saved ' . $request->vin);
	    } catch (Illuminate\Database\QueryException $e) {
		    return redirect('/vehicles/')->with('message', 'Failed to save ' . $request->vin);
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
        //
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
    public function __construct()
    {
        $this->middleware('auth');
    }
}
