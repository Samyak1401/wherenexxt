<?php

namespace App\Http\Controllers;

use App\Mail\WelcomeMail;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;

use function Symfony\Component\Clock\now;

class RegistrationController extends Controller
{
    //

    public function index()
    {
        return view("register");
    }
    public function register(Request $request)
    {
        $validate = Validator::make($request->all(), [
            'f_name' => 'required|string|max:50',
            'l_name' => 'required',
            'email' => 'required|string|unique:customer,customer_email',
            'password' => 'required|min:8|max:16',
            'confirm_password' => 'required|same:password'
        ], [
            'f_name.required' => 'The First name is required',
            'l_name.required' => 'The Last name is required',
            'password.min' => 'The Password should contain atleast 8 characters',
            'password.max' => 'The Password should not exceed 16 characters',
            'confirm_password.same' => 'The Confirm Password must match with Password'
        ]);
        if ($validate->passes()) {

            $user = new User;
            $user->Customer_Fname = $request->f_name;
            $user->Customer_Lname = $request->l_name;
            $user->Customer_EMAIL = $request->email;
            $user->customer_password = Hash::make($request->password);
            $user->save();
            $request->session()->put('fname', $user->Customer_Fname = $request->f_name);
            Mail::to($request->email)->send(new WelcomeMail($user->Customer_Fname));



            return redirect()->route('customer.home')->with('succes', "You have registered successfully");
        } else {
            return redirect()->back()->withErrors($validate)->withInput();
        }
    }
}
