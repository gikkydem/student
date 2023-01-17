<?php

namespace App\Http\Controllers;

use App\Models\car;
use App\Models\mechanic;
use App\Models\owner;
use Illuminate\Http\Request;

class OwnerController extends Controller
{
    //
    public function add_owner($id)
    {
        $car = car::find($id);
        $owner = new  owner();
        $owner->name = 'duck';
        $car->owner()->save($owner);
    }


    public function show_owner($id){
        // $owner= mechanic::find($id)->car->owner;
        $owner= mechanic::find($id)->owner;
        return $owner;
    }
}
