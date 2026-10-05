<?php

namespace App\Http\Controllers;

use App\Models\Post;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::all();

        return view('post.index', ['posts' => $posts, 'title' => 'Posts']);
    }

    public function show(int $id)
    {
        $post = Post::findOrFail($id);

        return view('post.show', ['post' => $post, 'title' => $post->title]);

    }

    public function create()
    {
        Post::create([
            'title' => 'find Post',
            'content' => 'This is a new findable post.',
            'author_id' => 1,
            'is_published' => true,
        ]);

        return redirect('/blog');

    }
}
