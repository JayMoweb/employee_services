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
    
        $allRecord = User::get();       
    	return view('adminDashboard',['allRecord' => $allRecord]);
    }
   
    public function changeStatus(Request $request) {
    	$user = User::find($request->id);
    	 
    	$user->status = $request->status == 1 ? 0: 1;
    	$user->save();

    	return response()->json(['success' =>'Status change successfully']);

    }

}
