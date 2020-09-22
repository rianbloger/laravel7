<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
// use \App\Models\Post;

class PostController extends Controller
{
    public function index()
    {
        // $posts = Post::take(5)->get();
        $posts = Post::paginate(10);
        // return Post::get(['title']);
        // User::where('votes', '>', 100)->paginate(15);
        // $posts = \DB::table('posts')->simplePaginate(2);
        // dd($posts);
        return view('posts.index', ['posts' => $posts]);
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
        return view('posts.show', compact('post'));
    }
}
