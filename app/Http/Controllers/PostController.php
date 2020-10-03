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
        $this->middleware('auth')->except(['index', 'show']);
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
        // return back();
        return redirect('posts');
    }

    public function store(PostRequest $request)
    {
        $request->validate([
            'thumbnail' => 'image|mimes:jpeg,png,jpg,svg|max:2048'
        ]);
        $attr = $request->all();
        $slug =  \Str::slug(request('title'));
        if (request()->file('thumbnail')) {
            $thumbnail = request()->file('thumbnail')->store("images/posts");
        } else {
            $thumbnail = null;
        }
        $attr['slug'] =  $slug;


        // $thumbnailUrl = $thumbnail->storeAs("images/posts", "{$slug}.{$thumbnail->extension()}");
        // $attr = $this->validateRequest();

        $attr['thumbnail'] = $thumbnail;
        $attr['category_id'] = request('category');
        // $attr['user_id'] = auth()->id();
        // $post = Post::create($attr);
        $post = auth()->user()->posts()->create($attr);
        $post->tags()->attach(request('tags'));
        session()->flash('success', 'The post was created');
        return redirect('posts');
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
        $request->validate([
            'thumbnail' => 'image|mimes:jpeg,png,jpg,svg|max:2048'
        ]);
        $this->authorize('update', $post);
        if (request()->file('thumbnail')) {
            \Storage::delete($post->thumbnail);
            $thumbnail = request()->file('thumbnail')->store("images/posts");
        } else {
            $thumbnail = $post->thumbnail;
        }

        $attr = $request->all();
        $attr['category_id'] = request('category');
        $attr['thumbnail'] = $thumbnail;
        $attr['user_id'] = auth()->id();
        // $attr = $this->validateRequest();
        $post->update($attr);
        $post->tags()->sync(request('tags'));
        session()->flash('success', 'The post was updated');
        return redirect('posts');
    }

    public function destroy_old(Post $post)
    {
        if (auth()->user()->is($post->author)) {
            \Storage::delete($post->thumbnail);
            $post->tags()->detach();
            $post->delete();
            session()->flash('success', 'The post was destroyed');
            return redirect('posts');
        } else {
            session()->flash('Error', "It wasn't your post");
            return redirect('posts');
        }
    }

    public function destroy(Post $post)
    {
        $this->authorize('delete', $post);
        \Storage::delete($post->thumbnail);
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
