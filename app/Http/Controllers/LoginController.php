<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Contracts\Session\Session;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class LoginController extends Controller
{
    //
    public function index()
    {
        return view('login');
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
                $request->session()->put('fname', $customer->Customer_Fname);
                return redirect()->route('customer.home');
            } else {
                return back()->with('error', 'Invalid email or password');
            }
        } else {
            return back()->withErrors($validate)->withInput();
        }
    }
    public function logout()
    {
        Auth::logout();
        return redirect()->route('customer.loginview');
    }
}
