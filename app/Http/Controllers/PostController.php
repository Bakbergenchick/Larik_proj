<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;
use function GuzzleHttp\Promise\all;

class PostController extends Controller
{

    public function postsByCategory(Category $category)
    {
        $posts = $category->posts;
        $cats = Category::all();
        return view('posts.index', ['myPosts' => $posts, 'cats'=>$cats]);
    }

    public function index()
    {
        $allPosts = Post::all();
        $cats = Category::all();
//        $category = Category::where('id', 3)->first();
//        dd($category->posts);

//        $post = $allPosts -> get(0);
//        dd($post->category);

        return view('posts.index', ['myPosts' => $allPosts, 'cats' => $cats]);
    }


    public function create()
    {
        $cats = Category::all();
        return view('posts.createPost', ['cats' => $cats]);
    }


    public function store(Request $request)
    {
        Post::create([
            'title' => $request -> input('title'),
            'content' => $request -> input('content'),
            'category_id' => $request -> input('cat_id')
        ]);

        return redirect() -> route('posts.index');
    }

    public function show(Post $post)
    {
        return view('posts.show', ['post' => $post]);
    }


    public function edit(Post $post)
    {
        $cats = Category::all();
        return view('posts.edit', ['post' => $post, 'cats'=>$cats]);
    }


    public function update(Request $request, Post $post)
    {
        $post -> update([
           'title' => $request -> input('title'),
           'content' => $request -> input('content'),
           'category_id' => $request -> input('cat_id')
        ]);


        return redirect() -> route('posts.index');
    }


    public function destroy(Post $post)
    {
        $post -> delete();

        return redirect() -> route('posts.index');
    }
}
