<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\Property;
use App\Models\Owner;
use App\Enums\Type;


class PropertyController extends Controller
{
    
    public function index()
    {
        $Property = Property::all();
        return view('Property', compact('Property'));
    }
    public function getPropertyDetail($id)
    {
        $owner = Owner::all();
        $pro = Property::all();
        $prod = Property::where("id",$id)->first();
        $type = Type::getValues();
        return view("Propertydetail", compact('prod','pro','type','owner'));
    }
    public function update(Request $request)

    {   $Property = Property::all();
        $request->session()->flash('action', 'update');
        Property::where("id", $request->id)->update([
            'type' => $request->type,
            'property_number' => $request->property_number,
            'owner_id' => $request->owner,  
        ]);
        return redirect()->route('Property');
    }
}
