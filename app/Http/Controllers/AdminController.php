<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\image;
use App\Models\package;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;


class AdminController extends Controller
{

    public function index() //returns the admin login page view
    {
        return view('admin.admin-login');
    }
    public function login(Request $request) //process the admin login request
    {
        //valdiate entered data
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
    public function dashboard() //return the view of the admin dashboard
    {
        return view('admin.admin-dashboard');
    }

    public function customer(Request $request) //display all the customers details
    {
        $customers = User::all(); //fetch all the customer from database
        return view('customer-view', compact('customers'));
    }
    public function AddPackage() //return the view for adding a new package
    {
        return view('admin.add-package');
    }
    public function storePackage(Request $request) //proccess the request for storing a package
    {
        //validate entered data  using validator class in laravel framework.
        $validate = Validator::make($request->all(), [
            'package_id' => 'required|numeric|unique:package,Package_Id',
            'destination' => 'required|string',
            'description' => 'required|string',
            'inclusions' => 'required|string',
            'exclusion' => 'required|string',
            'price' => 'required|integer',
            'duration' => 'required|integer',
            'max_people' => 'required|integer',
            'start_date' => 'required |date',
            'start_place' => 'required|string',
            'end_date' => 'required|date',

        ]);
        if ($validate->passes()) {

            $package = new Package();
            $package->Package_Id = $request->package_id;
            $package->Destination = $request->destination;
            $package->Description = $request->description;
            $package->Inclusions = $request->inclusions;
            $package->Exclusions = $request->exclusion;
            $package->Price = $request->price;
            $package->Duration = $request->duration;
            $package->Max_people = $request->max_people;
            $package->Start_Date = $request->start_date;
            $package->start_place = $request->start_place;
            $package->End_Date = $request->end_date;
            if ($request->hasFile('pimage')) {
                $file = $request->file('pimage');
                $extension = $file->getClientOriginalExtension();
                $fileName = time() . '.' . $extension;
                $file->move('images/', $fileName);
                $package->Poster_image = $fileName;
            }
            $package->save();
            return redirect()->route('AddItineraryview', ['id' => $request->package_id]); //return view of add itinerary view passing id as parameter
        } else {
            return redirect()->back()->withErrors($validate)->withInput();
        }
    }
    public function ViewItinerary($id)
    {
        return view('admin.add-itinerary', compact('id'));
    }
}
