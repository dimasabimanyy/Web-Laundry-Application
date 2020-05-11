<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use App\User;

class MemberController extends Controller
{
    public function index(Request $request){
        $key = $request->q_nama;
    	$users = User::OrderBy('name');
    	if ($key != '') {
    		$users->where('name','like','%' . $key . '%');
    	}
        $users = $users->get();
        return view('member_index',compact('users'));
    }
    public function delete(Request$request){
        $user = User::findOrFail($request->id); 
        $user->delete($request->all());
        return redirect('/member')->withSuccess('Pengguna berhasil dihapus!');
    }
}
