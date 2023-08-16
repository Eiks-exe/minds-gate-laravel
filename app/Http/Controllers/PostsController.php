<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

class PostsController extends Controller
{
    /**
     *  return posts.
     * 
     */
    public function index()
    {
        $posts = Post::all();
        return view("welcome", ['posts' => $posts]);
    }

    public function create()
    {
        return view("editor");
    }

    public function store(Request $request)
    {
        // Validate the request
        $request->validate([
            'title' => 'bail|required|string|max:255',
            "content" => 'bail|required',
        ]);
        
        // Create a new post
        

        Post::create([
            "id" => $request->id,
            "title" => $request->title,
            "content" => $request->content,
            "user_id" => auth()->id(), // Assuming you want to associate the post with the currently logged-in user
        ]);
    
        // Uncomment the line below when you're sure the post creation is working
        // return redirect(route('dashboard'));
    }

    public function show(Post $post)
    {
    }

    public function edit(Post $post)
    {
    }

    public function update(Request $request, Post $post)
    {
    }

    public function destroy(Post $post)
    {
    }
}
