<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Tag;

class TagController extends Controller
{
    public function index()
    {
        $tags = Tag::all();

        return view('tag.index', ['tags' => $tags, 'title' => 'Tags']);
    }

    public function create()
    {
        Tag::create([
            'title' => 'tag '.rand(1, 1000),
        ]);

        return redirect('/blog');

    }

    public function testMany2Many()
    {
        $post1 = Post::find(1);
        $post2 = Post::find(2);

        $post1->tags()->attach([1, 2]);
        $post2->tags()->attach([1]);

        return response()->json([
            'post1' => $post1->tags,
            'post2' => $post2->tags,
        ]);
    }
}
