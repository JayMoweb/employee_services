<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\ConfirmsPasswords;
use Illuminate\Http\Request;
use DB;
use Hash;

class ConfirmPasswordController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Confirm Password Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling password confirmations and
    | uses a simple trait to include the behavior. You're free to explore
    | this trait and override any functions that require customization.
    |
    */

    use ConfirmsPasswords;

    /**
     * Where to redirect users when the intended url fails.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //$this->middleware('auth');
    }
    public function resetPassword(request $request,$token) {
        $email =  DB::table('password_resets')->where('token',$token)->select('email','token')->first();
        if (!empty($email->token) == $token) {
           return view('confirmPassword',['token' =>$token]);            
        }else{
            return abort(404);
        }
        
    }
    public function saveUpdatePassword(request $request,$token) {

        if ($request->newpassword != $request->confirmpassword) {
            return back()->with('error','password and confirm password not same');
        }
        $email =  DB::table('password_resets')->where('token',$token)->select('email','token')->get();
        $user = DB::table('users')
                ->where('email', $email[0]->email)
                ->update(['password' => Hash::make($request->newpassword)]);
        $delete = DB::table('password_resets')->where('token',$token)->delete();
        return redirect('login');
    }
}
