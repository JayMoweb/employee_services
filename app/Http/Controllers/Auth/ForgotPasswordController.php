<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\SendsPasswordResetEmails;
use Illuminate\Http\Request;
use DB;
use Str;
use Mail;
use Carbon\Carbon;
use App\Mail\QueueEmail;


class ForgotPasswordController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Password Reset Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling password reset emails and
    | includes a trait which assists in sending these notifications from
    | your application to your users. Feel free to explore this trait.
    |
    */

    use SendsPasswordResetEmails;


    public function sendEmail(Request $request) {
        
        $request->validate([
            'email' =>'required'
        ]);

         $email = DB::table('users')->select('email')->pluck('email')->first();
        
         if ($request->input('email')  != $email) {
            return back()->with('error','Incorrect Password');
         }else{

            $token = Str::random(18);
            $resetPassword = DB::table('password_resets')->insert([
                'email' =>$request->email,
                'token' =>$token
            ]);

            $sendEmail = (new QueueEmail($token))->delay(Carbon::now()->addMinutes(1));
            Mail::to($request->email)->send($sendEmail);
            return view('forgotPassword');
         }  
    } 
}
