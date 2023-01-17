<?php

namespace App\Http\Controllers;

use App\Models\language;
use App\Models\project;
use Illuminate\Http\Request;

class LanguageController extends Controller
{
    //
    public function add_lang($id)
    {
        $pro = project::find($id);

        $language = new language();
        $language->name = 'php';
        $pro->language()->save($language);
    }
}
