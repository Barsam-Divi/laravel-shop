<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Http\Requests\VerifyOtpRequest;
use App\Mail\OtpMail;
use App\Models\role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

class RegisterController extends Controller
{

    public function create()
    {
        return view('client.register.create');
    }

    public function sendMail(Request $request)
    {

         $request->validate([
            'email' => ['required' , 'email']
        ]);

       $user = User::GenerateOtp($request);


        return redirect(route('client.register.otp',$user));

    }

    public function otp(User $user)
    {
        return view('client.register.otp',compact('user'));
    }

    public function verifyOtp(VerifyOtpRequest $request,User $user)
    {
        if (!Hash::check($request->get('otp') , $user->password))
        {
            return redirect()->back()->withErrors(['otp'=>'کد اشتباه است لطفا دوباره تلاش کنید']);
        }
        auth()->login($user);

        return redirect(route('client.home'));

    }

    public function logout()
    {
        auth()->logout();

        return redirect()->back();
    }
}
