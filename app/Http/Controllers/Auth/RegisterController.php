<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use App\Models\EmployeeMaster;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use DB;
use Storage;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;
    public function showRegistrationForm()
    {
        return view('register');
    }

    /**
     * Where to redirect users after registration.
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
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    // protected function create(array $data)
    // {
    //     return User::create([
    //         'name' => $data['name'],
    //         'email' => $data['email'],
    //         'password' => Hash::make($data['password']),
    //     ]);
    // }

    public function fetch() {
        $masterFramework = DB::table('framework_master')->get();
        return view('register',compact('masterFramework'));
    }

    public function create(User $user,request $request) {   

        $user = new User();
        
        $request->validate([
            'firstname' =>'required',
            'lastname'  => 'required',
            'email'    =>'required',
            'password' =>'required',
            'confirmpassword' =>'required',
            // 'image' => 'required | image| nullable',
        ]);
            
            $user->firstname =  $request->firstname;
            $user->lastname  = $request->lastname;
            $user->email    = $request->email;
            $user->password = Hash::make($request->password);
            $user->role     = "user";
            $user->status    = '1';
            // $user->image = $fileName;
            $user->save();
            
            $user->technology()->sync($request->framework);
           
        return redirect('login');
    }
}
