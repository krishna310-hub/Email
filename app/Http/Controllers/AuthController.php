<?php

namespace App\Http\Controllers;

use App\Models\email;
use App\Models\emailotpmodel ;
use Illuminate\Http\Request;
use App\Mail\emailOtp;
    use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login()
    {
        return view('auth.login');
    }
    public function loginData(Request $request)
    {
        // dd($request);
        $credentials = $request->only('username','email','password');
        $datas = email::where('username',$request->uname)
                            ->where('email',$request->email)
                            ->where('password',$request->pswd)->first();
                            // dd($datas);
        if($datas){
            // dd('hi');
            Auth::login($datas);
            return redirect('auth/loginSuccess');
        }else{
        return redirect()->route('login')->with('error', 'Invalid. Please try again.');
        }
}


    public function register()
    {
        return view('auth.register');
    }
    public function store(Request $request)
    {
         $request->validate([
            'username' => 'required',
            'email' => 'required',
            'password' => 'required',
        ]);
        // $hashedPassword = bcrypt($request->password);

        Email::create([
            'username' => $request->username,
            'email' => $request->email,
            'password' => $request->password,
        ]);
        return redirect('login');
    }




    public function forgot()
    {
        return view('auth.forgot');
    }
    public function generateAndSendOtp(Request $request)
    {
        $request->validate([
            'email' => 'required',
        ]);

        $email = $request->input('email');
        $user = email::where('email',$email)->first();
        // dd($user);
        if ($user)
        {
            $otp =mt_rand(100000, 999999);

            emailotpmodel::create(
                [
                    'email'=>$email,
                    'otp'=>$otp,
                ]
                );
                Mail::to('elangokrish310@gmail.com')->send(new emailOtp($otp));
                return view('auth.otp',compact('email'));
         }
        else
        {
            //  dd($user);
            return redirect()->route('forgot')->with('error', 'Invalid Mail');
        }
    }



    public function otp()
    {
        return view('auth.otp');
    }

    public function verifyOtp(Request $request)
    {
    //    dd($request);
        $request->validate([
            'otp' => 'required',
        ]);
        // dd($request);

        $otp = $request->input('otp');
        $otpEntry = emailotpmodel::where('otp',$otp)->latest()->first();

        // dd($otpEntry);

        if ($otpEntry)
        {
            //  dd('hi');
            return view('auth/newpass');
        }
        else
        {
            // dd('hi');
            return redirect()->route('otp')->with('error', 'Invalid otp');
        }
    }




    public function newpass()
    {
        return view('auth.newpass');
    }
    public function updatePassword(Request $request)
    {

// dd($request);
    $email = $request->input('email');
    $newPassword = $request->input('password');
// dd($request);
    $user = email::where('email', $email)->first();
// dd($request);
    if ($user)
    {
        // dd('hi');
        $user->password = $newPassword;
        $user->save();

        return view('auth/login');
    }
    else
    {
        return redirect()->route('login')->with('error', 'Invalid mail');
    }
    }



    public function loginSuccess()
    {
        return view('auth.loginSuccess');
    }

}


