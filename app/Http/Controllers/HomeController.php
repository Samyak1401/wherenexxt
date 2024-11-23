<?php

namespace App\Http\Controllers;

use App\Models\package;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    //
    public function displaypackage()
    {
        $packages = package::all();
        return view('index', compact('packages'));
    }
}
