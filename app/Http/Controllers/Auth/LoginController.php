<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Auth;
use DB;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;
     public function showLoginForm()
    {
        //dd(Auth::user());
        return view('login');
    }

    /**
     * Where to redirect users after login.
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
        $this->middleware('guest')->except('logout');
    }

    public function login(request $request) {
        
        $login = $request->validate([
            "email" => 'required|email',
            "password" => 'required'
        ]);


        $loginUserData = DB::table('users')
                        ->where('email',$request->email)
                        ->where('status',1)
                        ->first();

        if(!empty($loginUserData))
        {
            if (Auth::attempt($login)) {
                   
                if (auth()->user()->role == 'user' ) {    
                    return redirect('dashboard')->with('success','Successfully');
                }elseif(auth()->user()->role == 'admin') {
                    return redirect('adminDashboard')->with('success','Successfully');
                }else{
                    return back()->with('error','Enter correct credentials');
                }

            }else{
                return back()->with('error','Enter correct credentials');
            }
        }else
        {
            return back()->with('error','Your account deactive');
        }
    }

    public function logout(request $request) {
        Auth::logout();
        return redirect('login');
    }
}
