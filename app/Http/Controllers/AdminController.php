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
    public function storePackage(Request $request)
    {
        $validate = Validator::make($request->all(), [
            'id' => 'required|numeric',
            'destination' => 'required|string',
            'description' => 'required|string',
            'inclusions' => 'required|string',
            'exclusion' => 'required|string',
            'price' => 'required|integer',
            'duration' => 'required|integer',
            'max_people' => 'required|integer',
            'start_date' => 'required |date',
            'start_place' => 'required|string'
            //'image' => 'required|mimes:jpg,png,jpeg'
        ]);
        if ($validate->passes()) {
            print_r($request->all());
            $id = $request->input('id');
            return redirect()->route('AddItineraryview', ['id' => $id]);
        } else {
            return back()->withErrors($validate)->withInput();
        }
    }
    public function ViewItinerary($id)
    {
        return view('admin.add-itinerary', compact('id'));
    }
}
