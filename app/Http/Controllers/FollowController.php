<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class FollowController extends Controller
{
    /**
     * Abonnement à un utilisateur
     */
    public function store(User $user): RedirectResponse
    {
        // Sécurité : impossible de se suivre soi-même
        abort_if($user->id === auth()->id(), 403, 'Vous ne pouvez pas vous abonner à vous-même.');

        // firstOrCreate évite les doublons même si le bouton est cliqué 2x
        auth()->user()->following()->syncWithoutDetaching([$user->id]);

        return back()->with('success', "Vous suivez maintenant {$user->name}.");
    }

    /**
     * Désabonnement
     */
    public function destroy(User $user): RedirectResponse
    {
        auth()->user()->following()->detach($user->id);

        return back()->with('success', "Vous ne suivez plus {$user->name}.");
    }
}

