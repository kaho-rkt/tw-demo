<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use \App\User;
use \App\Follow;

class UserController extends Controller
{
     // public function __construct()
      //{
	  	//$this->middleware('auth');
	  //}
    
      //public function index(Request $request)
     // {
     //  		//Eloquent使用して取得
     // 		//<>自分以外
     //  	$where = [
     //  		['users.id','<>',Auth::id()],
     //  	];

     //  	$users = User::where();
    	// return view('user.list',['users' => $users]);

     // }

	public function index()
     {
    	$users = User::getTlUser();

		//$test = User::find(31);
		//dd($test->follows);


	    return view('user.list',['users' => $users]);

     }

     
    public function follow(Request $request)
     {
     	$follow = new Follow;
     	$follow->user_id = Auth::id();
		$follow->follow_id = $request->followId;
		$follow->save();
     	

     	return redirect()->route('user_list');
     }

}
