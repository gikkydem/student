<?php

namespace App\Http\Controllers;

use App\Models\mechanic;
use Illuminate\Http\Request;

class MechanicController extends Controller
{
    //
    public function add_mac(){
        $mac=new mechanic();
        $mac->name='joy';
        $mac->save();
    }
}
