<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\OwnerMember;
use App\Enums\Gender;
use App\Enums\Relationship;
use App\Models\Owner;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\DB;

class OwnerMemberController extends Controller
{
    public function index()
    {
        $ownerMembers = OwnerMember::paginate(5);
        $owners = Owner::all();
        $genders = Gender::getValues();
        $relationships = Relationship::getValues();

        return view('OwnerMember', compact('ownerMembers', 'genders', 'relationships', 'owners'));
    }

    public function create(Request $request)
    {
        $owners = Owner::all();
        $request->session()->flash('action', 'create');

        $this->validate($request, [
            'name' => 'required',
            'name' => 'string|max:50',
        ], [
            'name.required' => 'name is required',
        ]);
        // $this->validate($request, [
        //     'birthday' => ['required', 'date_format:yyyy-mm-dd']
        // ],[
        //     'birthday.required' => 'birthday is required',
        //     'birthday.date_format' => 'wrong format date (yyyy-mm-dd) for birthday',
        // ]);
        $this->validate($request, ['gender' =>  Rule::in(Gender::getValues())]);
        $this->validate($request, ['relationship' => Rule::in(Relationship::getValues())]);
        $this->validate($request, ['owner' => [
            'required',
            Rule::in($owners->map(function ($o) {
                return $o->id;
            }))
        ]]);

        $createdOwner = OwnerMember::create([
            'name' => $request->name,
            'birthday' => $request->birthday,
            'gender' => $request->gender,
            'relationship' => $request->relationship,
            'owner_id' => $request->owner,
        ]);
        return redirect()->route('ownermember');;
    }

    public function update(Request $request)
    {
        $owners = Owner::all();
        $request->session()->flash('action', 'update');

        $this->validate($request, [
            'name' => 'nullable|string|max:50'
        ]);
        // $this->validate($request, [
        //     'birthday' => ['required', 'date_format:yyyy-mm-dd']
        // ],[
        //     'birthday.required' => 'birthday is required',
        //     'birthday.date_format' => 'wrong format date (yyyy-mm-dd) for birthday',
        // ]);
        $this->validate($request, ['gender' =>  ['nullable', Rule::in(Gender::getValues())]]);
        $this->validate($request, ['relationship' => ['nullable', Rule::in(Relationship::getValues())]]);
        $this->validate($request, [
            'owner' => [
                'nullable',
                Rule::in($owners->map(function ($o) {
                    return $o->id;
                }))
            ]
        ]);

        OwnerMember::where("id", $request->id)->update([
            'name' => $request->name,
            'birthday' => $request->birthday,
            'gender' => $request->gender,
            'relationship' => $request->relationship,
            'owner_id' => $request->owner,
        ]);
        return redirect()->route('ownermember');
    }

    public function delete(Request $request)
    {
        OwnerMember::where("id", $request->id)->delete();
        return redirect()->route('ownermember');;
    }

    public function filter(Request $request)
    {
        $q_ownerMembers = OwnerMember::query();
        $owners = Owner::all();
        $genders = Gender::getValues();
        $relationships = Relationship::getValues();

        if ($request->has('name')) {
            $q_ownerMembers->whereRaw("LOWER(name) LIKE '%". strtolower($request->name). "%'");
        }
        if ($request->has('genders') && is_array($request->genders) && !in_array("all",$request->genders)) {
            $q_ownerMembers->whereIn('gender', $request->genders);
        }
        if ($request->has('owners') && is_array($request->owners) && !in_array("all",$request->owners)) {
            $q_ownerMembers->whereIn('owner', $request->owners);
        }

        $ownerMembers = $q_ownerMembers->paginate(5);
        return view('OwnerMember', compact('ownerMembers', 'genders', 'relationships', 'owners'));
    }

    public function search(Request $request)
    {
        $q_ownerMembers = OwnerMember::query();
        $owners = Owner::all();
        $genders = Gender::getValues();
        $relationships = Relationship::getValues();

        if ($request->has('searchTerm') && !empty($request->searchTerm)) {
            $q_ownerMembers->whereRaw("LOWER(name) LIKE '%". strtolower($request->searchTerm). "%'");
        }

        $ownerMembers = $q_ownerMembers->paginate(5);
        return view('OwnerMember', compact('ownerMembers', 'genders', 'relationships', 'owners'));
    }
}
