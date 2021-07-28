<?php

namespace App\Http\Controllers\Admin;

use App\Category;
use App\Http\Controllers\Controller;
use App\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $posts = Post::all()->sortByDesc('id');
        return view('admin.posts.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        return view('admin.posts.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        //ddd($request->all());

        $validateData = $request->validate([
            'title' => 'required | min:5 | max:255',
            'image' => 'nullable | image | max:50',
            'category_id' => 'nullable | exists:categories,id',
            'body' => 'required'
        ]);
        //ddd($validateData);
        // Opzione con hasFile
         if($request->hasFile('image')){
            $file_path = Storage::put('post_images', $validateData['image']); //post_images/isdnmdgpo.jpg
            //ddd($file_path);
            $validateData['image'] = $file_path;
        }

        //ddd($validateData);
        Post::create($validateData);
        return redirect()->route('admin.posts.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        return view('admin.posts.show', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        $categories = Category::all();
        return view('admin.posts.edit', compact('post', 'categories'));


    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        //ddd($request->hasFile('image'));

        $validateData = $request->validate([
            'title' => 'required | min:5 | max:255',
            'image' => 'nullable | image | max:50',
            'category_id' => 'nullable | exists:categories,id',
            'body' => 'required'
        ]);
        //ddd($validateData);

        // Opzione per verificare se chiave esiste in un array in plain php
        if(array_key_exists('image', $validateData)) {
            $file_path = Storage::put('post_images', $validateData['image']);
            //ddd($file_path);
            $validateData['image'] = $file_path;
        }
        //ddd($validateData);

        $post->update($validateData);
        return redirect()->route('admin.posts.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        $post->delete();
        return redirect()->route('admin.posts.index');
    }
}
