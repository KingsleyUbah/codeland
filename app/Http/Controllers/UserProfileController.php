<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Hash;
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


    public function edit(User $user)
    {
        return view('profile.edit', compact('user'));
    }

    public function update(Request $request, User $user) 
    {
        
        $this->validate($request, [
            'name' => 'required',
            'username' => 'required',
            'location' => 'required',
            'github' => 'required',
            'bio' => 'required',
            'email' => 'required|email',
            'old_password' => 'required',
        ]);

        if(auth()->user()->id != $user->id) 
        {
            abort(401, 'Unauthorized');
        }

        if(!Hash::check($request->old_password, $user->password)) 
        {
            return back()->withMessage('Incorrect password. Please try again');
        }
        

        $user->update([
            'name' => $request->name,
            'username' => $request->username,
            'location' => $request->location,
            'github' => $request->github,
            'bio' => $request->bio,
            'email' => $request->email,
            'password' => Hash::make($request->new_password),
        ]);
        
        return back()->withMessage('Profile Updated!');
        
    }

    public function notifications()
    {
        return view('notifications');
    }
}
