<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Thread;
use App\Models\User;

use Illuminate\Http\Request;

class UserProfileController extends Controller
{
    public function index(User $user) 
    {
        $threads = Thread::where('user_id', $user->id)->latest()->get();

        $comments = Comment::where('user_id', $user->id)->where('commentable_type', 'App\Models\Thread')->get();

        return view('profile.index', compact('threads', 'comments', 'user'));
    }
}
