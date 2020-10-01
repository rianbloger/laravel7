@extends('layouts.app')

@section('content')
<div class="container">
    @if ($posts->count() )
    <div class="d-flex justify-content-between">
        <div>
            @isset($category)
            <h4>Category {{ $category->name }}</h4>
            @endisset

            @isset($tag)
            <h4>Tag {{ $tag->name }}</h4>
            @endisset
            
            @if (!isset($category) && !isset($tag))
                <h4>All posts</h4>
            @endif
            <hr>
        </div>
        <div>
            @if (Auth::check())
            <a href="{{ route('posts.create') }}" class="btn btn-primary">New post</a>
            @else
            <a href="{{ route('login') }}" class="btn btn-primary">Login</a>
            @endif
        </div>
    </div>
    
    <div class="row">
        
        @foreach ($posts as $post)
        <div class="col-md-4">
            <div class="card mb-4">
                <div class="card-header">
                    {{ $post->title }}
                </div>
                <div class="card-body">
                    <div>
                        {{ Str::limit($post->body, 100, '...') }}
                    </div>
                    <a href="/posts/{{ $post->slug }}">Read more</a>
                </div>
                <div class="card-footer d-flex justify-content-between">
                    Publish on {{ $post->created_at->format("d M, Y") }}
                    {{-- @if (auth()->user()->is($post->author))
                    <a href="/posts/{{ $post->slug }}/edit" class="btn btn-success btn-sm">Edit</a>
                    @endif --}}
                    @can('update', $post)
                    <a href="/posts/{{ $post->slug }}/edit" class="btn btn-success btn-sm">Edit</a>
                    @endcan
                </div>
            </div>
        </div>
        @endforeach
            
        
            
            
    </div>
    <div class="d-flex justify-content-center">
        {{ $posts->links() }}
    </div>
    @else
        <div class="alert alert-info" role="alert">
          <h4 class="alert-heading">There are no post.</h4>
          <p></p>
          <p class="mb-0"></p>
          <a href="{{ route('posts.create') }}" class="btn btn-primary">New post</a>
        </div>
            
        @endif
    
</div>
@endsection