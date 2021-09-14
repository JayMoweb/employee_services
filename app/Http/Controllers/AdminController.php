<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Models\User;
use App\Models\FrameworkEmployee;

class AdminController extends Controller
{
    //
    public function AllShowRecord() {
    	// $allRecord = DB::table('users')->get();
// $allRecord = FrameworkEmployee::with('user')->get();
        $allRecord = DB::table('framework_employee_mapping')
                    ->leftjoin('framework_master','framework_employee_mapping.framework_id', '=', 'framework_master.id')
                    ->leftjoin('users','framework_employee_mapping.user_id','=','users.id')
                    ->get();
           // dd($data); 

           // dd($allRecord);        
    	return view('adminDashboard',['allRecord' => $allRecord]);
    }
   
    public function changeStatus(Request $request) {
    	$user = User::find($request->id);
    	 
    	$user->status = $request->status == 1 ? 0: 1;
    	$user->save();

    	return response()->json(['success' =>'Status change successfully']);

    }

}
