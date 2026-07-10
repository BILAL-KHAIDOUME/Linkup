<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class SavedPostController extends Controller
{
    /**
     * Liste des posts sauvegardés par l'utilisateur connecté
     */
    public function index(): View
    {
        $posts = auth()->user()
            ->savedPosts()
            ->with(['user', 'originalPost.user', 'likes', 'comments.user'])
            ->paginate(15);

        return view('saved-items.index', compact('posts'));
    }

    public function store(Post $post): RedirectResponse
    {
        auth()->user()->savedPosts()->syncWithoutDetaching([$post->id]);

        return back()->with('success', 'Post ajouté à vos éléments sauvegardés.');
    }

    public function destroy(Post $post): RedirectResponse
    {
        auth()->user()->savedPosts()->detach($post->id);

        return back()->with('success', 'Post retiré de vos éléments sauvegardés.');
    }
}

