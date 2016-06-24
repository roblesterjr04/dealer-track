<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Object;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class ObjectsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $objects = Object::get();
	    return view('objects', ['title'=>'Resource Objects', 'addnew'=>'Resource Object', 'objects'=>$objects, 'table'=>'objects']);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('record/object', ['table'=>'objects', 'title'=>'Objects', 'subtitle'=>'Create Object']);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
	    $object = Object::findOrFail($id);
	    $data = unserialize($object->data);
        return view('record/object', ['table'=>'objects','object'=>$object, 'title'=>'Objects', 'subtitle'=>'Edit '.$object->name, 'data'=>$data]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id = false)
    {
        $this->validate($request, [
	        'a_name' => 'required|max:55',
	    ]);
	    if ($id) $object = Object::findOrFail($id);
	    else $object = new Object();
	    $object->name = $request->a_name;
	    $saved = $object->save();
	    if (!$id) $id = $object->id;
	    return redirect('/objects/'.$id.'?saved='.$saved);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Object::findOrFail($id)->delete();
        return redirect('/objects');
    }
    public function __construct()
   {
      $this->middleware('auth');
   }
}
