<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
// use \App\Models\Post;

class PostController extends Controller
{
    public function index()
    {
        return Post::get();
    }

    public function show(Post $post)
    {
        // return $slug;
        // $post = \DB::table('posts')->where('slug',$slug)->first();
        // $post = \App\Models\Post::where('slug',$slug)->first();
        // $post = Post::where('slug',$slug)->firstOrFail();
        // dd($post);
        // if(is_null($post)){
        //     abort(404);
        // }
        return view('posts.show',compact('post'));
    }
}