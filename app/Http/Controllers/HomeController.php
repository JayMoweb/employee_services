<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use DB;
use Hash;



class HomeController extends Controller
{
    //
    public function dashboard(User $user) {
        
        $user = User::find(Auth()->user()->id);
        return view('dashboard',['user' => $user]); 
    }
    public function editProfile(User $user,$id) {
    	$editProfileId = User::find($id);
    	return view('editProfile',['edit' => $editProfileId]);
    }
    public function profile(User $user,request $request, $id) {
    	$data = User::find($id);
    	$data->firstname = $request->firstname;
    	$data->lastname = $request->lastname;
    	$data->email = $request->email;
    	$data->save();
    	return redirect('dashboard');
    }
    public function editPassword(request $request) {
    	DB::table('users')->where('id',auth()->user()->id)->update(['password' => Hash::make($request->newpassword)]);
    	return route('logout');
    }
}
