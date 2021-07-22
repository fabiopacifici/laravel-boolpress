@extends('layouts.app')


@section('content')

<div class="container">
    <img class="img-fluid" src="{{$post->image}}" alt="{{$post->title}}">
    <h1 class="display-1">{{$post->title}}</h1>
    <p class="lead">{{$post->body}}</p>

    <a href="{{route('posts.index')}}">Back</a>
</div>



@endsection
