<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Contracts\Session\Session;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\Mail\OtpMail;
use Illuminate\Support\Facades\Mail;

class LoginController extends Controller
{
    //
    public function index()
    {
        return view('login');
    }
    public function showOtpForm()
    {
        return view('auth.otpverify');
    }
    public function login(Request $request)
    {
        $validate = Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required|min:8'
        ]);
        if ($validate->passes()) {
            // Authenticate user here
            $customer = User::where('Customer_Email', $request->email)->get()->first();
            if ($customer && Hash::check($request->password, $customer->Customer_Password)) {
                // Login successful
                $otp = $this->generateOTP();
                session(['otp' => $otp]);
                $this->sendOtpMail($customer->Customer_Email, $otp);
                $request->session()->put('fname', $customer->Customer_Fname);
                return redirect()->route('showotpform');
            } else {
                return back()->with('error', 'Invalid email or password');
            }
        } else {
            return back()->withErrors($validate)->withInput();
        }
    }
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->flush();
        return redirect()->route('customer.home');
    }
    public function generateOTP()
    {
        return rand(100000, 999999); // Generates a 6-digit OTP
    }
    public function sendOtpMail($user, $otp)
    {
        $details = [
            'title' => 'Your OTP Code',
            'otp' => $otp
        ];

        Mail::to($user)->send(new OtpMail($details));
    }
    public function verifyOtp(Request $request)
    {
        $otp = $request->input('otp');

        // Compare the OTP entered by the user with the stored OTP
        if ($otp == session('otp')) {
            session()->forget('otp'); // Clear OTP after successful verification
            return redirect()->route('customer.home'); // Redirect to the desired page after login
        } else {
            return back()->withErrors(['otp' => 'Invalid OTP.']);
        }
    }
}
