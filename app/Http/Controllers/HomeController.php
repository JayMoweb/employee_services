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
    	return response()->json(['success'=>'Successfully',compact('editProfileId')]);
    }
    public function profile(User $user,request $request, $id) {
    	$data = User::find($id);
    	$data->firstname = $request->firstname;
    	$data->lastname = $request->lastname;
        $data->email = $request->email;
    	$data->save();
    	return response()->json(['Success' =>'successfully']);
    }
    public function editPassword(request $request) {
    	DB::table('users')->where('id',auth()->user()->id)->update(['password' => Hash::make($request->newpassword)]);
    	return route('logout');
    }

    public function barchart() {
       $getBarchart = DB::table('employee_salary')->get();
        
       $dataPoint = [];

       foreach ($getBarchart as $key => $value) { 
            $dataPoint[] = array(        
                "name" =>$value->employee_name,
                "data" =>[
                    intval($value->employee_salary1),
                    intval($value->employee_salary2),
                    intval($value->employee_salary3),
                    intval($value->employee_salary4)
                ]
            );
       }
       return view('barchart',['data' => json_encode($dataPoint),"employee" => json_encode(array("salary1","salary2","salary3","salary4"))]);
    }
}
