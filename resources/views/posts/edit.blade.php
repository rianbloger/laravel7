@extends('layouts.app',['title' => 'Update post'])

    
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-6">
            
            <div class="card">
                <div class="card-header">
                    Update Post {{ $post->title }}
                </div>
                <div class="card-body">
                    <form action="/posts/store"  method="POST">
                        @csrf
                        <div class="form-group">
                          <label for="">Title</label>
                          <input type="text" name="title" id="title" class="form-control" placeholder="" aria-describedby="helpId">
                          @error('title')
                              {{-- Title itu harus di isi --}}
                              <div class="mt-2 text-danger">
                                  {{ $message }}
                              </div>
                          @enderror
                        </div>
                        <div class="form-group">
                          <label for="">Body</label>
                          <textarea name="body" class="form-control" id="body" cols="30" rows="10"></textarea>
                          @error('body')
                              {{-- Title itu harus di isi --}}
                              <div class="mt-2 text-danger">
                                  {{ $message }}
                              </div>
                          @enderror
                        </div>

                        <button type="submit" class="btn btn-primary">Update</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
    
@endsection