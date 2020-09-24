@extends('layouts.app')

@section('content')
<div class="container">
    @if ($posts->count() )
    <div class="d-flex justify-content-between">
        <div>
            <h4>All Post</h4>
            <hr>
        </div>
        <div>
            <a href="/posts/create" class="btn btn-primary">New post</a>
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
                <div class="card-footer">
                    Publish on {{ $post->created_at->format("d M, Y") }}
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
        </div>
            
        @endif
    
</div>
@endsection