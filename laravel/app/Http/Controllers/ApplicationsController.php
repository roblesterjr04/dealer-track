<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Application;
use App\Object;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class ApplicationsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $apps = Application::get();
        return view('apps', ['addnew'=>'App', 'title'=>'Applications', 'table'=>'apps', 'apps'=>$apps]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
	    $objects = Object::get();
        return view('record/application', ['table'=>'apps', 'title'=>'Applications', 'subtitle'=>'Create App', 'objects'=>$objects]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    /*public function store(Request $request)
    {
        $this->validate($request, [
	        'a_name' => 'required|max:255',
	    ]);
	    $app = new Application();
        $app->name = $request->a_name;
        $app->save();
        return redirect('/apps/'.$app->id);
    }*/

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
        $app = Application::findOrFail($id);
        $app->key = $app->key ?: $this->app_key();
        $app->private = $app->private ?: $this->app_key();
        $objects = Object::get();
        $objects_perms = [];
        $perms = $app->objects;
        if ($perms) {
	        $perms = unserialize($perms);
	        foreach ($objects as $object) {
		        $oid = $object->id;
		        if (isset($perms['OBJ'.$oid])) $object->permissions = $perms['OBJ'.$oid];
	        }
        }
	    return view('record/application', ['table'=>'apps','application'=>$app, 'title'=>'Applications', 'subtitle'=>'Edit '.$app->name, 'objects'=>$objects]);
    }
    
    public function app_key() {
	    $full = \Hash::make(date('u') . time() . date('aeYMmldi'));
	    return substr(base64_encode($full), 8, 32);
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
        if ($id) $app = Application::findOrFail($id);
        else $app = new Application();
        $app->name = $request->a_name;
        $app->key = $request->a_key;
        $app->private = $request->a_secret;
        $app->objects = serialize($request->objects);
        $saved = $app->save();
        if (!$id) $id = $app->id;
        return redirect('/apps/'.$id.'?saved='.$saved);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Application::findOrFail($id)->delete();
        return redirect('/apps');
    }
    
    public function __construct()
   {
      $this->middleware('auth');
   }
}
