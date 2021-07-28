@extends('layouts.app')


@section('content')
<div class="jumbotron">
    <h1 class="display-3"> Articles in {{$category->name}}</h1>
</div>
<div class="posts-category container">

    @forelse($category->posts as $post)
    <div class="card">
        <img class="card-img-top" src="{{$post->image}}" alt="{{$post->title}} image">
        <div class="card-body">
            <h4 class="card-title">{{$post->title}}</h4>
            <p class="card-text">{{$post->body}}</p>
        </div>
    </div>
    @empty
    <p>Nothing to see here</p>
    @endforelse

</div>

@stop
