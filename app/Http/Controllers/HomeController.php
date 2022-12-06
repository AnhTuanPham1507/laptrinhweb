<?php

namespace App\Http\Controllers;

use App\Models\Fee;
use App\Models\Owner;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $request)
    {
        if($request->has("month"))
        {
            $fees = Fee::with("Property")->where('month',$request->get("month"))->get();
        }
        else
        {
            $month = date("m");
            $fees = Fee::with("Property")->where('month',$month)->get();
        }
        return view('home',compact("fees"));
    }
}
