<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Post extends Model
{
    use HasFactory;
     protected $fillable = [
        'content',
        'user_id',
        'original_post_id',
        'shares_count',
    ];

     public function user(): BelongsTo
    {
        return $this->belongsTo(User::class , 'user_id') ;
    }
    
    public function comments() : HasMany
    {
        return $this->hasMany(Comment::class );
    }

    public function likes() : HasMany
    {
        return $this->hasMany(Like::class);
    }

    public function originalPost(): BelongsTo
    {
        return $this->belongsTo(Post::class, 'original_post_id');
    }

    /**
     * Tous les reposts qui pointent vers ce post
     */
    public function reposts(): HasMany
    {
        return $this->hasMany(Post::class, 'original_post_id');
    }

    public function isRepost(): bool
    {
        return $this->original_post_id !== null;
    }

    /**
     * Vérifie si $user a déjà reposté ce post précis
     */
    public function hasBeenRepostedBy(User $user): bool
    {
        return $this->reposts()->where('user_id', $user->id)->exists();
    }
}


