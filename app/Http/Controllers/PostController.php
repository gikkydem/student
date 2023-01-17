<?php

namespace App\Http\Controllers;

use App\Models\author;
use App\Models\post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    //
    public function post($id)
    {
        $author = author::find($id);

        $post = new post();
        $post->title = 'title 5';
        $author->post()->save($post);
    }


    // get post base on author id

    public function show_post($id)
    {
        $post = author::find($id)->post;
        return $post;
    }
}
