@extends('layouts.app')



@section('content')


<h1 class="p-3"> SPA Blog</h1>
<div class="container-fluid d-flex flex-wrap">

    <div class="card text-left w-25 " v-for="post in posts">
        <img class="card-img-top" :src="post.image" alt="">
        <div class="card-body">
            <a :href="'blog/' + post.id ">
                <h4 class="card-title">@{{post.title}}</h4>
            </a>
            <p class="card-text">@{{post.body}}</p>
        </div>
    </div>
</div>
@endsection
