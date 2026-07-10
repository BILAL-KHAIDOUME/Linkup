<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RepostController extends Controller
{
    public function store(Post $post): RedirectResponse
    {
        // On ne peut pas reposter son propre post
        abort_if($post->user_id === auth()->id(), 403, "Vous ne pouvez pas partager votre propre publication.");

        // Empêche les reposts en doublon par le même utilisateur
        if ($post->hasBeenRepostedBy(auth()->user())) {
            return back()->with('info', 'Vous avez déjà partagé cette publication.');
        }

        // Si on reposte un repost, on pointe toujours vers le post ORIGINE (évite les chaînes)
        $originalPost = $post->isRepost() ? $post->originalPost : $post;

        DB::transaction(function () use ($originalPost) {
            Post::create([
                'user_id'           => auth()->id(),
                'content'           => $originalPost->content,
                'original_post_id'  => $originalPost->id,
                'shares_count'      => 0,
            ]);

            $originalPost->increment('shares_count');
        });

        return back()->with('success', 'Publication partagée sur votre profil.');
    }

    public function destroy(Post $post): RedirectResponse
    {
        abort_if($post->user_id !== auth()->id(), 403);
        abort_if(!$post->isRepost(), 400, "Ce post n'est pas un repost.");

        DB::transaction(function () use ($post) {
            $post->originalPost?->decrement('shares_count');
            $post->delete();
        });

        return back()->with('success', 'Repost annulé.');
    }
}


