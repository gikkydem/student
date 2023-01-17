<?php

namespace App\Http\Controllers;

use App\Models\group;
use App\Models\member;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    //
    public function index($id)
    {
        $member = member::find($id);
        var_dump($member->name);
        var_dump($member->email);
        var_dump($member->group->group_name);


        // $member=group::find($id)->member;
        // dd($member);


        // $group=member::find($id)->group;
        // dd($group);
    }
}
