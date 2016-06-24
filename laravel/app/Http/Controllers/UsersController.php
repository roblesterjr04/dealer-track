<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Auth\PasswordController;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
	    $users = User::get();
	    return view('users', ['title'=>'Users', 'addnew'=>'User', 'users'=>$users, 'table'=>'users']);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('record/user', ['title'=>'Users', 'subtitle'=>'Create User']);
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
	        'u_name' => 'required|max:255',
	        'u_email' => 'required|max:255',
	        'u_password' => 'required|max:60'
	    ]);
	    $password = \Hash::make($request->u_password);
        $user = new User();
        $user->email = $request->u_email;
        $user->phone = $request->phone;
        $user->name = $request->u_name;
        $user->password = $password;
        $user->save();
        return redirect('/users/'.$user->id);
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
	    $user = User::findOrFail($id);
	    return view('record/user', ['user'=>$user, 'title'=>'Users', 'subtitle'=>'Edit '.$user->name]);
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
	    $this->validate($request, [
	        'u_name' => 'required|max:255',
	        'u_email' => 'required|max:255',
	    ]);
	    $user = User::findOrFail($id);
	    $user->name = $request->u_name;
	    $user->email = $request->u_email;
	    $user->phone = $request->phone;
	    if ($request->u_password != '') {
		    $password = \Hash::make($request->u_password);
		    $user->password = $password;
	    }
	    $saved = $user->save();
        return redirect('/users/'.$id.'?saved='.$saved);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
	    User::findOrFail($id)->delete();
        return redirect('/users');
    }
    
    public function __construct()
   {
      $this->middleware('auth');
   }
}
