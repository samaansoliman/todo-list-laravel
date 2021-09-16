<?php

namespace App\Http\Controllers;

// Import the Post Model
use App\Models\Post;

use Illuminate\Http\Request;

class PostsController extends Controller
{

    // publick index function
    public function index()
    {
        $posts = Post::all();
        return view('posts.index', ['posts' => $posts]);
    }


    // publick create function
    public function create()
    {
        return view('posts.create');
    }


    // publick create function
    public function store()
    {
        request()->validate([

            'title'   => 'required',
            'content' => 'required',
        ]);

        post::create([

            'title' =>   Request('title'),
            'content' => Request('content'),
        ]);

        return redirect('/posts');
    }


    // publick edit function
    public function edit(post $post)
    {
        return view('posts.edit', ['post' => $post]);
    }


    // publick update function
    public function update(post $post)
    {
        request()->validate([

            'title'   => 'required',
            'content' => 'required',
        ]);

        $post->update([

            'title' =>   Request('title'),
            'content' => Request('content'),
        ]);

        return redirect('/posts');
    }

    public function destroy(post $post)
    {
        $post->delete();
        return redirect('/posts');
    }

}

