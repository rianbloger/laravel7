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
        $posts = Post::paginate(6);
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

    public function create()
    {
        return view('posts.create');
    }

    public function store(Request $request)
    {
        // $post = new Post;
        // $post->title = $request->title;
        // $post->slug = \Str::slug($request->title);
        // $post->body = $request->body;
        // $post->save();
        // return redirect()->to('posts');

        // Post::create([
        //     'title' =>  $request->title,
        //     'slug' => \Str::slug($request->title),
        //     'body' => $request->body
        // ]);

        // $this->validate($request, [
        //     'title' => 'required|min:3',
        //     'body' => 'required'
        // ]);
        // penjelasan ada di resources lang/en validation.php
        $attr = $request->validate([
            'title' => 'required|min:3|max:10',
            'body' => 'required'
        ]);
        // dd($attr);
        // $post = $request->all();
        $attr['slug'] =  \Str::slug($request->title);
        Post::crate($attr);
        return back();
    }
}
