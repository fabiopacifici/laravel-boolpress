@extends('layouts.admin')

@section('content')
<h1>Create a new post</h1>
@if ($errors->any())
<div class="alert alert-danger">
    <ul>
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif
<form action="{{route('admin.posts.store')}}" method="post" enctype="multipart/form-data">
    @csrf

    <div class="form-group">
        <label for="title">Title</label>
        <input type="text" name="title" id="title" class="form-control @error('title') is-invalid @enderror" placeholder="add a title" aria-describedby="titleHelper" value="{{old('title')}}">
        <small id="titleHelper" class="text-muted">Type a title for the current post, max: 255 char</small>
    </div>

    <div class="form-group">
        <label for="image">Cover Image</label>
        <input type="file" name="image" id="image">
    </div>
    @error('image')
    <div class="alert alert-danger">{{ $message }}</div>
    @enderror
    <div class="form-group">
        <label for="body">Body</label>
        <textarea class="form-control @error('body') is-invalid @enderror" name="body" id="body" rows="4">{{old('body')}}</textarea>
    </div>


    <div class="form-group">
        <label for="category_id">Categories</label>
        <select class="form-control" name="category_id" id="category_id">
            <option value="" selected>Select a category</option>

            @foreach($categories as $category)
            <option value="{{$category->id}}">{{$category->name}}</option>
            @endforeach


        </select>
    </div>

    <div class="form-group">
        <label for="tags">Tags</label>
        <select multiple class="form-control" name="tags[]" id="tags">
            <option value="" disabled> Select a Tag </option>
            @if($tags)
            @foreach($tags as $tag)
            <option value="{{$tag->id}}">{{$tag->name}}</option>
            @endforeach
            @endif

        </select>
    </div>



    <button type="submit" class="btn btn-success">Submit</button>

</form>

@endsection
