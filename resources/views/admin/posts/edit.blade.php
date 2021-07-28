@extends('layouts.admin')

@section('content')
<h1>Edit a new post</h1>
@if ($errors->any())
<div class="alert alert-danger">
    <ul>
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif
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
        <input type="file" name="image" id="image">
    </div>

    <div class="form-group">
        <label for="body">Body</label>
        <textarea class="form-control @error('body') is-invalid @enderror" name="body" id="body" rows="4">{{ $post->body}}</textarea>
    </div>

    <div class="form-group">
        <label for="category_id">Categories</label>
        <select class="form-control" name="category_id" id="category_id">
            <option value="">Select a category</option>

            @foreach($categories as $category)
            dd(old('category_id', $post->category_id));
            <option value="{{ $category->id }}" {{ $category->id === old('category_id', $post->category_id) ? 'selected' : '' }}> {{$category->name}} </option>

            @endforeach

        </select>
    </div>


    <button type="submit" class="btn btn-success">Update</button>

</form>

@endsection
