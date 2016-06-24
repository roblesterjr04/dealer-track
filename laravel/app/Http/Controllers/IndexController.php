<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class IndexController extends Controller
{
	
   public function index() {
	   return view('dashboard', ['title'=>'Dashboard', 'subtitle'=>'Version 1.0']);
   }
   
   public function __construct()
   {
      $this->middleware('auth');
   }
}
