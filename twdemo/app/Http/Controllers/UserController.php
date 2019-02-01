<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class UserController extends Controller
{
    public function create()
    {

    	return view('users.create');
    }

    public function store(Request $request)//requestの中に_fromの中身が入っている
    {
    	
    	//データを登録する(create)
        $hassyadaiUser = new User;
        $hassyadaiUser->name = $request->name;
        $hassyadaiUser->email = $request->email;
        $hassyadaiUser->save();

        return redirect("/");
    	
    	//return view('users.create');
		
		//$params = $request->validate([
        	//'name' => 'required|max:50',
        	//'email' => 'required|max:2000',
       //]);

    User::create($params);
	}

	public function index(Request $req)
	{
		//dd('test');
		$userData = User::all();//データベースから取ってくる

		//dd($userData);
		return view('users.index',['userData' => $userData]);
	}

	
	public function edit($id)
	{
		//dd('$user');
		//dd($id);

		$user = User::findOrFail($id);
		//dd($user);
		return view('users.edit',['user' => $user]);

	}

	public function update(Request $request)
	{
		//dd("ここはupdate");
		//更新データ設定
		$updateData = [
			'name' => $request->name,
			'email' => $request->email,
		];

		// dd(User::wher('id',$request->id)->get());

		// //これだと全てのユーザーのデータが更新される
		//User::all()->update($updateData);
		

		//データ更新
		User::where('id', $request->id)
			->update($updateData);

		return redirect("/");

	}

	public function getDelete($id)
	{
		User::destroy($id);

		// return redirect("/");
	}

	public function postDelete(Request $request)
	{
		// dd($request);
		User::destroy($request->id);
		return redirect("/");
	}


}




