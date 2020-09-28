<?php

namespace App\Http\Controllers;

use App\Http\Requests\PostRequest;
use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;
use Illuminate\Http\Request;
// use \App\Models\Post;

class PostController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth')->except(['index','show']);
    }

    public function index()
    {
        // $posts = Post::take(5)->get();
        $posts = Post::latest()->paginate(6);
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
        return view('posts.create', [
            'post' => new Post(),
            'categories' => Category::get(),
            'tags' => Tag::get(),
        ]);
    }

    public function store_old(Request $request)
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
        Post::create($attr);
        return back();
    }

    public function store(PostRequest $request)
    {
        // $attr = $this->validateRequest();
        $attr = $request->all();
        $attr['slug'] =  \Str::slug(request('title'));
        $attr['category_id'] = request('category');
        $post = Post::create($attr);
        $post->tags()->attach(request('tags'));
        session()->flash('success', 'The post was created');
        return back();
    }

    public function edit(Post $post)
    {

        return view('posts.edit', [
            'post' => $post,
            'categories' => Category::get(),
            'tags' => Tag::get(),
        ]);
    }

    public function update(PostRequest $request, Post $post)
    {
        $attr = $request->all();
        $attr['category_id'] = request('category');
        // $attr = $this->validateRequest();
        $post->update($attr);
        $post->tags()->sync(request('tags'));
        session()->flash('success', 'The post was updated');
        return redirect('posts');
    }

    public function destroy(Post $post)
    {
        $post->tags()->detach();
        $post->delete();
        session()->flash('success', 'The post was destroyed');
        return redirect('posts');
    }

    public function validateRequest()
    {
        return request()->validate([
            'title' => 'required|min:3|max:10',
            'body' => 'required'
        ]);
    }
}