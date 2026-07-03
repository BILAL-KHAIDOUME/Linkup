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
}
