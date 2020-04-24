<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Image;
use App\User;

class UserController extends Controller
{
    public function edit(){
    	return view('/profile',array('user' => Auth::user()) );
    }
    public function user_update(Request $request){
    	//Handle the user upload avatar
    	//Package for image -> image intervention
         

    	if ($request->hasFile('avatar')) 
    	{
    		$avatar = $request->file('avatar');
    		$filename = time() . '.' . $avatar->getClientOriginalExtension();
    		Image::make($avatar)->resize(300,300)->save(public_path('/uploads/avatars/' . $filename) );

    		$user = Auth::user();
    		$user->avatar = $filename;
    		$user->save();
    	}

        $data = User::findOrFail(Auth::user()->id);
        $data->alamat = $request['alamat'];
        $data->deskripsi = $request['deskripsi'];
        $data->name = $request['name'];
        $data->email = $request['email'];

        $data->save();

    	// return view('/profile',array('user' => Auth::user()))->withSuccess('Berhasil Diupdate!');
        return redirect('/profile');

    }
}
