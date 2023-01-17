<?php

namespace App\Http\Controllers;

use App\Models\author;
use App\Models\post;

use Illuminate\Http\Request;

class Post_indexController extends Controller
{
    //
    public function index($id)
    {
        $author = author::find($id);
        // var_dump($author->username);
        // var_dump($author->password);
        // dd($author->post);

        foreach ($author->post as $post){
            echo $post .'<br>';
        }
    }
}
