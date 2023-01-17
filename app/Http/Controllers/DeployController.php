<?php

namespace App\Http\Controllers;

use App\Models\deploy;
use App\Models\language;
use App\Models\project;
use Illuminate\Http\Request;

class DeployController extends Controller
{
    //
    public function add_deploy($id){
        $language=language::find($id);

        $deploy=new deploy();
        $deploy->work='done';
        $language->deploy()->save($deploy);
    }

    public function show_deploy($id){
        $deploy= project::find($id)->deploy;
        return $deploy;
    }
}
