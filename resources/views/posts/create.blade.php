@extends('layouts.app',['title' => 'New Post'])

    
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    New Post
                </div>
                <div class="card-body">
                    <form action="/posts/store"  method="POST">
                        @csrf
                        <div class="form-group">
                          <label for="">Title</label>
                          <input type="text" name="title" id="title" class="form-control" placeholder="" aria-describedby="helpId">
                          <small id="helpId" class="text-muted">Help text</small>
                        </div>
                        <div class="form-group">
                          <label for="">Body</label>
                          <textarea name="body" class="form-control" id="body" cols="30" rows="10"></textarea>
                        </div>

                        <button type="submit" class="btn btn-primary">Create</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
    
@endsection