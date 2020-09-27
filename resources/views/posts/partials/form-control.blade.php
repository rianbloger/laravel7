<div class="form-group">
    <label for="">Title</label>
    <input type="text" name="title" id="title" value="{{ old('title') ?? $post->title }}" class="form-control" placeholder="" aria-describedby="helpId">
    @error('title')
        {{-- Title itu harus di isi --}}
        <div class="mt-2 text-danger">
            {{ $message }}
        </div>
    @enderror
  </div>
  <div class="form-group">
    <label for="">category</label>
    <select name="category" id="category" class="form-control">
        <option value="" disabled selected>Choose one</option>
        @foreach ($categories as $category)
            <option {{ $category->id == $post->category_id ? 'selected' : '' }} value="{{ $category->id }}" >{{ $category->name }}</option>
        @endforeach
    </select>
    @error('category')
        {{-- Title itu harus di isi --}}
        <div class="mt-2 text-danger">
            {{ $message }}
        </div>
    @enderror
  </div>
  <div class="form-group">
    <label for="tags">tag</label>
    <select name="tags[]" id="tags" class="form-control select2"  multiple>
        @foreach ($post->tags as $tag)
            <option selected value="{{ $tag->id }}" >{{ $tag->name }}</option>
        @endforeach
        @foreach ($tags as $tag)
        <option value="{{ $tag->id }}" >{{ $tag->name }}</option>
    @endforeach
    </select>
    @error('tags')
        {{-- Title itu harus di isi --}}
        <div class="mt-2 text-danger">
            {{ $message }}
        </div>
    @enderror
  </div>
  <div class="form-group">
    <label for="">Body</label>
    <textarea name="body" class="form-control" id="body"  cols="30" rows="10">{{ old('body') ?? $post->body }}</textarea>
    @error('body')
        {{-- Title itu harus di isi --}}
        <div class="mt-2 text-danger">
            {{ $message }}
        </div>
    @enderror
  </div>

  <button type="submit" class="btn btn-primary">{{ $submit ?? 'Update' }}</button>