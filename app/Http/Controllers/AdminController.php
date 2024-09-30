<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class AdminController extends Controller
{
    //
    public function index()
    {
        return view('admin-login');
    }
    public function login(Request $request)
    {
        $validate = Validator::make($request->all(), [
            'aemail' => 'required',
            'apassword' => 'required',
        ]);
        if ($validate->passes()) {
            if ($request->aemail == "wherenext05@gmail.com") {
                if ($request->apassword == "wherenext05") {
                    return redirect()->route('admin.dashboard')->with('success', 'Login successful');
                } else {
                    return back()->with('error', 'Invalid password');
                }
            } else {
                return back()->with('error', 'Invalid email');
            }
        } else {
            return back()->withErrors($validate)->withInput();
        }
    }

    public function dashboard()
    {
        return view('admin-dashboard');
    }

    public function customer(Request $request)
    {
        $customers = User::all();
        return view('customer-view', compact('customers'));
    }
}
