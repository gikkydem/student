<?php

namespace App\Http\Controllers;

use App\Models\author;
use App\Models\post;
use Illuminate\Http\Request;

class AuthorController extends Controller
{
    //
    public function author(){
        $author= new author();
        $author->username='duck';
        $author->password='duck123';
        $author->save();
    }

    // get author on base of post
    public function show_author($id)
    {
        $author = post::find($id)->author;
        return $author;
    }
}
