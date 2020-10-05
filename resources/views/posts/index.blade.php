@extends('layouts.app')

@section('content')
<div class="container">
    @if ($posts->count() )
    <div>
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
        {{-- <div>
            @if (Auth::check())
            <a href="{{ route('posts.create') }}" class="btn btn-primary">New post</a>
            @else
            <a href="{{ route('login') }}" class="btn btn-primary">Login</a>
            @endif
        </div> --}}
    </div>
    
    <div class="row">
        
        @foreach ($posts as $post)
        <div class="col-md-6">
                
            @if ($post->thumbnail)
            <a href="{{ route('posts.show',$post->slug) }}">
            <img style="height: 320px; object-fit:cover; object-position:center" class="card-img-top" src="{{ asset("storage/".$post->thumbnail) }}"></img>    
        </a>
            @endif
            <div class="card-body">
                <div>
                    <a href="{{ route('categories.show',$post->category->slug) }}" class="text-secondary">
                        {{ $post->category->name }}
                    </a>
                </div>
                
                <a  href="{{ route('posts.show',$post->slug) }}" class="card-title">
                    {{ $post->title }}
                </a>
                <div>
                    {{ Str::limit($post->body, 100, '...') }}
                </div>
                <div class="d-flex justify-content-between align-items-center  mt-2">
                    <div class="media align-items-center">
                        <img width="40"  src="{{ $post->author->gravatar() }}" alt="" class="mr-3"   class="rounded-circle" >
                        <div class="media-body">
                          {{ $post->author->name }}
                        </div>
                        
                        {{-- Worth by {{ $post->author->name }} --}}
                      </div>
                    <div class="text-secondary">
                        <small>
                            {{-- <a href="/posts/{{ $post->slug }}">Read more</a> --}}
                        Publish on {{ $post->created_at->format("d M, Y") }}
                        {{-- @if (auth()->user()->is($post->author))
                        <a href="/posts/{{ $post->slug }}/edit" class="btn btn-success btn-sm">Edit</a>
                        @endif --}}
                        </small>
                        
                    </div>
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