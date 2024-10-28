<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AdminController extends Controller
{
    //
    public function index()
    {
        return view('admin.admin-login');
    }
    public function login(Request $request)
    {
        $validate = Validator::make($request->all(), [
            'aemail' => 'required',
            'apassword' => 'required',
        ]);
        if ($validate->passes()) {
            $admin = Admin::where('Admin_Email', $request->aemail)->get()->first();
            if ($admin && md5($request->apassword) == $admin->Admin_Password) {
                return redirect()->route('admin.dashboard')->with('success', 'Login successful');
            } else {
                return back()->with('error', 'Invalid password');
            }
        } else {
            return back()->withErrors($validate)->withInput();
        }
    }
    public function dashboard()
    {
        return view('admin.admin-dashboard');
    }

    public function customer(Request $request)
    {
        $customers = User::all();
        return view('customer-view', compact('customers'));
    }
    public function AddPackage()
    {
        return view('admin.add-package');
    }
}
