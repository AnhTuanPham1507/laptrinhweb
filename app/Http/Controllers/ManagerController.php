<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Manager;

class ManagerController extends Controller
{
    public function index()
    {
        $managers = Manager::all();
        return view('manager',compact('managers'));
    }
}
