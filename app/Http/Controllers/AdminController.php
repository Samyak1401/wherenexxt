<?php

namespace App\Http\Controllers;

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
            $admin = $request->aemail;
            $password = $request->apassword;

            if ($admin == "Whernext05admin@gmail.com" && $password == "wherenext05") {
                return redirect("admin-dashboar")->with("success", "you are loggin");
            }
        } else {
            return back()->withErrors($validate)->withInput();
        }
    }
    public function dashboard()
    {
        return view('admin-dashboard');
    }
}
