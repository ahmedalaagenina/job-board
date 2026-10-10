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

    public function show( $id)
    {
        $post = Post::findOrFail($id);

        return view('post.show', ['post' => $post, 'title' => $post->title]);

    }

    public function create()
    {
        Post::create([
            'title' => 'find Post 3',
            'content' => 'This is a new findable post.',
            'author_id' => 2,
            'is_published' => true,
        ]);

        return redirect('/blog');

    }

    public function showComments( $id)
    {
        $post = Post::findOrFail($id);
        $comments = $post->comments;

        return view('post.comments', ['post' => $post, 'comments' => $comments]);
    }
}
