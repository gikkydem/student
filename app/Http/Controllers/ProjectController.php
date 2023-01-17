<?php

namespace App\Http\Controllers;

use App\Models\project;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    //

    public function add_pro(){
        $pro= new project();
        $pro->name='shopping';
        $pro->save();
    }
}
