<?php

namespace App\Http\Controllers;

use App\Models\Fee;
use App\Models\Owner;
use Illuminate\Http\Request;

class ChiPhi extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('layout.ChiPhi');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $namencc = Fee::all();
        $namekh = Owner::getValues();
        $request->session()->flash('action', 'create');

        $this->validate($request, [
            'namekh' => 'required',
            'namenkh' => 'string|max:50',
        ], [
            'namekh.required' => 'name is required',
        ]);
        $this->validate($request, [
            'namencc' => ['required',],
            'namencc' => 'string|max:50',
        ],[
            'namencc.required' => 'namencc is required',
            
        ]);
        $this->validate($request, [
            'month' => ['required',],
            'month' => 'number|max:15',
        ],[
            'month.required' => 'month is required',
            
        ]);
        $this->validate($request, [
            'electric_fee' => ['required',],
            'electric_fee' => 'number|max:20',
        ],[
            'electric_fee.required' => 'month is required',
            
        ]);
        $this->validate($request, [
            'property_id' => ['required',],
            'property_id' => 'number|max:20',
        ],[
            'electric_fee.required' => 'water is required',
            
        ]);
        $this->validate($request, [
            'water_fee' => ['required',],
            'water_fee' => 'number|max:20',
        ],[
            'water_fee.required' => 'water is required',
            
        ]);
        $this->validate($request, [
            'management_fee' => ['required',],
            'management_fee' => 'number|max:20',
        ],[
            'management_fee.required' => 'management is required',
            
        ]);
        $this->validate($request, [
            'parking_fee' => ['required',],
            'parking_fee' => 'number|max:20',
        ],[
            'parking_fee.required' => 'parking is required',
            
        ]);
        $this->validate($request, [
            'status' => ['required',],
            'status' => 'boolean',
        ],[
            'status.required' => 'status is required',
            
        ]);
        $this->validate($request, [
            'other_fee' => ['required',],
            'other_fee' => 'number|max:20',
        ],[
            'other_fee.required' => 'other is required',
            
        ]);
        $this->validate($request, ['ChiPhi' => [
            'required',
            Rule::in($createdChiPhi->map(function ($c) {
                return $c->id;
            }))
        ]];
        $createdChiPhi = ChiPhi::create([
            'namencc' => $request->namencc,
            'namekh' => $request->namekh,
            'month' => $request->month,
            'electric_fee' => $request->electric_fee,
            'water_fee' => $request->water_fee,
            'management_fee' => $request->management_fee,
            'parking_fee' => $request->parking_fee,
            'status_fee' => $request->status_fee,
            'property_fee' => $request->property_fee,
            'other_fee' => $request->other_fee,
        ]);
        return redirect()->route('ChiPhi');;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $namencc = Fee::all();
        $namekh = Owner::getValues();
        $request->session()->flash('action', 'update');

        $this->validate($request, [
            'namekh' => 'required',
            'namenkh' => 'string|max:50',
        ], [
            'namekh.required' => 'name is required',
        ]);
        $this->validate($request, [
            'namencc' => ['required',],
            'namencc' => 'string|max:50',
        ],[
            'namencc.required' => 'namencc is required',
            
        ]);
        $this->validate($request, [
            'month' => ['required',],
            'month' => 'number|max:15',
        ],[
            'month.required' => 'month is required',
            
        ]);
        $this->validate($request, [
            'electric_fee' => ['required',],
            'electric_fee' => 'number|max:20',
        ],[
            'electric_fee.required' => 'month is required',
            
        ]);
        $this->validate($request, [
            'property_id' => ['required',],
            'property_id' => 'number|max:20',
        ],[
            'electric_fee.required' => 'water is required',
            
        ]);
        $this->validate($request, [
            'water_fee' => ['required',],
            'water_fee' => 'number|max:20',
        ],[
            'water_fee.required' => 'water is required',
            
        ]);
        $this->validate($request, [
            'management_fee' => ['required',],
            'management_fee' => 'number|max:20',
        ],[
            'management_fee.required' => 'management is required',
            
        ]);
        $this->validate($request, [
            'parking_fee' => ['required',],
            'parking_fee' => 'number|max:20',
        ],[
            'parking_fee.required' => 'parking is required',
            
        ]);
        $this->validate($request, [
            'status' => ['required',],
            'status' => 'boolean',
        ],[
            'status.required' => 'status is required',
            
        ]);
        $this->validate($request, [
            'other_fee' => ['required',],
            'other_fee' => 'number|max:20',
        ],[
            'other_fee.required' => 'other is required',
            
        ]);
        $this->validate($request, ['ChiPhi' => [
            'required',
            Rule::in($createdChiPhi->map(function ($c) {
                return $c->id;
            }))
        ]];
        $createdChiPhi = ChiPhi::update([
            'namencc' => $request->namencc,
            'namekh' => $request->namekh,
            'month' => $request->month,
            'electric_fee' => $request->electric_fee,
            'water_fee' => $request->water_fee,
            'management_fee' => $request->management_fee,
            'parking_fee' => $request->parking_fee,
            'status_fee' => $request->status_fee,
            'property_fee' => $request->property_fee,
            'other_fee' => $request->other_fee,
        ]);
        return redirect()->route('ChiPhi');;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        //
        ChiPhi::where("namekh", $request->id)->delete();
        return redirect()->route('ChiPhi');;
    }
    public function search(Request $request)
    {
        $q_ChiPhi = ChiPhi::query();
        $namekh = Owner::all();
        $electric_fee = Fee::getValues();
        if ($request->has('searchTerm') && !empty($request->searchTerm)) {
            $q_ownerMembers->whereRaw("LOWER(name) LIKE '%". strtolower($request->searchTerm). "%'");
        }

        $ownerMembers = $q_ownerMembers->paginate(5);
        return view('ChiPhi', compact('ChiPhi', 'namekh', 'electric_fee',));
    }
}
