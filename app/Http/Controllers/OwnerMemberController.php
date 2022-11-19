<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\OwnerMember;
use App\Enums\Gender;
use App\Enums\Relationship;
use App\Models\Owner;
use Illuminate\Validation\Rule;

class OwnerMemberController extends Controller
{
    public function index()
    {
        $ownerMembers = OwnerMember::all();
        $owners = Owner::all();
        $genders = Gender::getValues();
        $relationships = Relationship::getValues();

        return view('OwnerMember', compact('ownerMembers', 'genders', 'relationships', 'owners'));
    }

    public function create(Request $request)
    {
        $owners = Owner::all();
        $request->session()->flash('action', 'create');

        $this->validate($request, ['name' => 'required'],['name.required' => 'Invalid name']);
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

        $createdOwner =OwnerMember::create([
            'name' => $request->name,
            'birthday' => $request->birthday,
            'gender' => $request->gender,
            'relationship' => $request->relationship,
            'owner_id' => $request->owner,
        ]);
        return redirect()->route('ownermember');;
    }
}
