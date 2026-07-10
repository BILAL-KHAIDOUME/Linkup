<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Database\Factories\UserFactory;
use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Attributes\Hidden;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Relations\HasMany;
use App\Models\Post;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

#[Fillable(['name', 'email', 'password', 'company', 'headline', 'image_url'])]
#[Hidden(['password', 'remember_token'])]
class User extends Authenticatable
{
    /** @use HasFactory<UserFactory> */
    use HasFactory, Notifiable;

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    public function posts(): HasMany
    {
        return $this->hasMany(Post::class);
    }

    public function comments(): HasMany
    {
        return $this->hasMany(Comment::class);
    }

    public function likes(): HasMany
    {
        return $this->hasMany(Like::class);
    }

    public function following(): BelongsToMany
    {
        return $this->belongsToMany(
            User::class,
            'follows',
            'follower_id', // clé de l'utilisateur courant dans la table pivot
            'user_id'      // clé de l'utilisateur suivi dans la table pivot
        )->withTimestamps();
    }

    /**
     * Les utilisateurs qui suivent CET utilisateur
     */
    public function followers(): BelongsToMany
    {
        return $this->belongsToMany(
            User::class,
            'follows',
            'user_id',
            'follower_id'
        )->withTimestamps();
    }

    /**
     * Vérifie si l'utilisateur courant (auth) suit déjà $user
     */
    public function isFollowing(User $user): bool
    {
        return $this->following()->where('user_id', $user->id)->exists();
    }

    public function savedPosts(): BelongsToMany
    {
        return $this->belongsToMany(Post::class, 'saved_posts', 'user_id', 'post_id')
            ->withTimestamps()
            ->latest('saved_posts.created_at');
    }

    public function hasSaved(Post $post): bool
    {
        return $this->savedPosts()->where('post_id', $post->id)->exists();
    }
}
