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

   <!--  <div class="form-group">
        <label for="image">Cover Image</label>
        <input type="text" name="image" id="image" class="form-control @error('image') is-invalid @enderror" placeholder="https://" aria-describedby="imageHelper" value="{{old('image')}}">
        <small id="imageHelper" class="text-muted">Type an image url for the current post, max: 255 char</small>
    </div> -->
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

    <button type="submit" class="btn btn-success">Submit</button>

</form>

@endsection
