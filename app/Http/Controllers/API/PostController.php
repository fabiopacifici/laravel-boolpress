<?php

namespace App\Http\Controllers\API;

use App\Post;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Resources\PostResource;

class PostController extends Controller
{
    public function index()
    {
        return PostResource::collection(Post::with(['category', 'tags'])->paginate());
    }
}
