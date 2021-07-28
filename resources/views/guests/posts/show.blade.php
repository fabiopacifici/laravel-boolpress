@extends('layouts.app')


@section('content')

<div class="container">
    <img class="img-fluid" src="{{asset('storage/' . $post->image)}}" alt="{{$post->title}}">
    <h1 class="display-1">{{$post->title}}</h1>
    <h5>Category:
        @if($post->category)
        <a href="{{route('categories.show', $post->category->slug)}}"> {{ $post->category->name }}</a>
        @else
        Un categorized
        @endif
    </h5>
    <div class="tags">
        Tags:
        @forelse($post->tags as $tag)
        <span> {{$tag->name}} </span>
        @empty
        <span>no tags yet</span>
        @endforelse
    </div>
    <p class="lead">{{$post->body}}</p>

    <a href="{{route('posts.index')}}">Back</a>
</div>



@endsection
