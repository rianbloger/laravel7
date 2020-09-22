@extends('layouts.app')

@section('content')
<div class="container">
    <h4>All Post</h4>
    <div class="row">
            <hr>
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
    
</div>
@endsection