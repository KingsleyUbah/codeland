<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;

    protected $fillable=['body', 'user_id'];

    public function commentable() 
    {
        return $this->morphTo();
    }

    public function user() 
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function comments() 
    {
        return $this->morphMany(Comment::class, 'commentable')->latest();
    }

    public function likes() 
    {
        return $this->morphMany(Like::class, 'likeable');
    }

    public function likedBy(User $user) 
    {
        return $this->likes->contains('user_id', $user->id);
    }
}
