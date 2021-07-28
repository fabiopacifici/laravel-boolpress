@extends('layouts.admin')

@section('content')


<img src="{{asset('storage/' . $post->image)}}" alt="{{$post->title}}">
<h1>
    {{$post->title}}
</h1>
<p> {{$post->body}}</p>




<a href="{{route('admin.posts.index')}}"> <i class="fas fa-arrow-left fa-sm fa-fw"></i> Back </a>
<a href="{{route('admin.posts.edit', $post->id)}}" class="text-muted"> Edit </a>



@endsection
