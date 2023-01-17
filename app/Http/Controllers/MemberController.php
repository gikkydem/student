<?php

namespace App\Http\Controllers;

use App\Models\group;
use App\Models\member;
use Illuminate\Http\Request;

class MemberController extends Controller
{
    //

    public function member()
    {
        $group = new group();
        $group->group_name = 'A';


        $member = new member();
        $member->name = 'bhumi';
        $member->email = 'bhumi@gmail.com';
        $member->save();

        $member->group()->save($group);
    }

    public function show($id)
    {
        $group = member::find($id)->group;
        // return $group;
        return view('group', compact('group'));
    }
}
