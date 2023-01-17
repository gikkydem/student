<?php

namespace App\Http\Controllers;

use App\Models\group;
use Illuminate\Http\Request;

class GroupController extends Controller
{
    //

    public function show($id)
    {
        $member = group::find($id)->member;
        return $member;
    }
}
