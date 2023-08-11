<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

class PostsController extends Controller
{

    /**
     *  @name createPost
     */

     public function createPost(Request $request){
        $incomingFields = $request->validate([

        ]);

        $incomingFields['title'] = strip_tags($incomingFields['title']);
        $incomingFields['content'] = strip_tags($incomingFields['content']);
        $incomingFields['user_id'] = auth()->id();

        Post::create($incomingFields);
        return redirect('/Dashboard');
     }


    /**
     *  return posts.
     * 
     */
    public function index() {
        return view("/dashboard", [
            "posts" => Post::all() 
        ]);
    } 

    public function posts()
    {
        // This defines a one-to-many relationship between User and Post
        return $this->hasMany(Post::class);
    }
    
    // In the controller or anywhere you want to use the function
    public function getUserPosts(Request $request)
    {
        // This finds the user by their id
        $user_posts =Post::where(auth()->user()->userPosts()->latest())->get();
        // This returns a collection of posts that belong to the user
        return view('dashboard', ['user_posts', $user_posts]);
    }

    public function show (string $slug, string $id): RedirectResponse | Post {
        $post = Post :: findOrFail($id);
        if ($post->slug != $slug){
            return to_route('bloh.show', ['slug' => $post->$slug, 'id' => $post->id]);
        }
        return $post;
    }

}
