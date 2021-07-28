@extends('layouts.admin')

@section('content')
<h1>Edit a new post</h1>

@include('partials.errors')

<form action="{{route('admin.posts.update', $post->id)}}" method="post" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <div class="form-group">
        <label for="title">Title</label>
        <input type="text" name="title" id="title" class="form-control @error('title') is-invalid @enderror" placeholder="add a title" aria-describedby="titleHelper" value="{{$post->title}}" minlength="5" max="255" required>
        <small id="titleHelper" class="text-muted">Type a title for the current post, max: 255 char</small>
    </div>
    @error('title')
    <div class="alert alert-danger">{{$message}}</div>
    @enderror



    <div class="form-group">
        <label for="image">Replace Cover Image</label>
        <img src="{{asset('storage/' . $post->image)}}" alt="">
        <input type="file" name="image" id="image" class="form-control @error('image') is-invalid @enderror">
    </div>
    @error('image')
    <div class="alert alert-danger">{{ $message }}</div>
    @enderror

    <div class="form-group">
        <label for="body">Body</label>
        <textarea class="form-control @error('body') is-invalid @enderror" name="body" id="body" rows="4">{{ $post->body}}</textarea>
    </div>

    @error('body')
    <div class="alert alert-danger">{{ $message }}</div>
    @enderror

    <div class="form-group">
        <label for="category_id">Categories</label>
        <select class="form-control @error('category_id') is-invalid @enderror" name="category_id" id="category_id">
            <option value="">Select a category</option>

            @foreach($categories as $category)
            <option value="{{ $category->id }}" {{ $category->id == old('category_id', $post->category_id) ? 'selected' : '' }}> {{$category->name}} </option>

            @endforeach

        </select>
    </div>
    @error('category_id')
    <div class="alert alert-danger">{{ $message }}</div>
    @enderror

    <div class="form-group">
        <label for="tags">Tags</label>
        <select multiple class="form-control @error('tags') is-invalid @enderror" name="tags[]" id="tags">
            <option value="" disabled> Select a Tag </option>
            @if($tags)
            @foreach($tags as $tag)
            @if ($errors->any())
            <option value="{{$tag->id}}" {{ in_array($tag->id, old('tags')) ? 'selected' : ''}}> {{$tag->name}} </option>
            @else
            <option value="{{$tag->id}}" {{ $post->tags->contains($tag) ? 'selected' : '' }}>{{$tag->name}}</option>
            @endif
            @endforeach
            @endif

        </select>
    </div>
    @error('tags')
    <div class="alert alert-danger">{{ $message }}</div>
    @enderror

    <button type="submit" class="btn btn-success">Update</button>

</form>

@endsection
