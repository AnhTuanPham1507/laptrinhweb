<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\Property;
use App\Models\Owner;
use App\Enums\Type;
use App\Enums\Gender;


class OwnerController extends Controller
{
    
    
   
    public function ownerlist()
    {
        $genders = Gender::getValues();
        $owner = Owner::paginate(10);
        return view('owner', compact('owner','genders'));
    }
    public function deleteowner($id)
    {
        $record = Owner::where("id", $id)->first();
        Owner::where("id", $id)->delete();
        $pro = Property::paginate(15);
        return redirect()->route('owner');
    }
    public function addowner()
    {
        $genders = Gender::getValues();
        $owner = Owner::all();
        return view('addowner', compact('owner','genders'));
    }
    public function insertowner(Request $request)
    {

        $owner = Owner::create([
            'name' => $request->name,
            'email' => $request->email,
            'phone'=>$request->phone,
            'hometown' => $request->hometown,
            'birthDay'=>$request->birthday,
            'gender'=>$request->gender
        ]);
        $owner = owner::all();
        return redirect()->route('owner');
    }
    public function update(Request $request)

    {   $owner = Owner::all();
        $request->session()->flash('action', 'update');
        Owner::where("id", $request->id)->update([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'hometown' => $request->hometown,
            'birthday' => $request->birthDay,
            'gender' => $request->gender,
        ]);
        return redirect()->route('owner');
    }
}
