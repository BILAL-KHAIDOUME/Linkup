<?php

namespace App\Http\Controllers;

use App\Http\Requests\PostRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Post;
use App\Models\User;

class PostController extends Controller
{
    //
    public function index()
    {
        // $posts = Post::with('user')->latest()->get();




        $posts = Post::with('user')->latest()->get();


        // return View::make("view")->with(array("user" => $user, "posts" => $posts));
        return view('feed', compact(['posts']));
    }





    public function store(PostRequest $request)
    {

        $validated = $request->validated();

        $validated["user_id"] = Auth::id();

        Post::create($validated);

        return redirect()->back();
    }

    public function edit(Post $post)
    {
        $this->authorize('update', $post);

        return view('posts.edit', compact('post'));
    }

    public function update(Request $request, Post $post)
    {
        $this->authorize('update', $post);

        $validated = $request->validate([
            'content' => 'required|string|max:5000',
        ]);

        $post->update($validated);

        return redirect()->route('feed');
    }

    public function destroy(Post $post)
    {
        $this->authorize('delete', $post);

        $post->delete();

        return redirect()->route('feed');
    }
}
