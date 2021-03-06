<?php

namespace App\Http\Controllers;

use App\Models\Thread;
use App\Models\Comment;
use App\Models\Tag;
use App\Models\Like;
use Illuminate\Http\Request;
use App\Notifications\LikedThread;
use Illuminate\Support\Facades\Input;


class ThreadController extends Controller
{

    public function index(Request $request)
    {
        $activePage = "all";

        if($request->has('tags')) {

            $tag = Tag::find($request->tags);
            $tag_name = $tag->name;
            $threads = $tag->threads;

        } else {
            $tag_name = null;
            $threads = Thread::paginate(15);
        }


        return view('thread.index', compact('threads', 'activePage', 'tag_name'));
    }


    public function create()
    {
        return view('thread.create');
    }


    public function store(Request $request)
    {
        $this->validate($request, [
            'subject' => 'required|max:50',
            'tags' => 'required',
            'body' => 'required|min:20'
        ]);

        $thread = auth()->user()->threads()->create($request->all());

        $thread->tags()->attach($request->tags);

        return back()->withMessage('Thread Created!');
    }


    public function show(Thread $thread)
    {
        $thread->update([
            'count' => $thread->count + 1,
        ]);

        $comment = Comment::where('commentable_id', $thread->id)->where('commentable_type', 'App\Models\Thread')->latest()->first();
        $solutions = Comment::where('id', $thread->solution)->where('commentable_type', 'App\Models\Thread')->get();
        

        return view('thread.single', compact('thread', 'comment', 'solutions'));
    }

    public function showActive()
    {

        $tag_name = null;
        $threads = Thread::whereNull('solution')->paginate(15);
        $activePage = "open";

        return view('thread.index', compact('threads', 'activePage', 'tag_name'));
    }

    public function showClosed()
    {
    
        $tag_name = null;
        $threads = Thread::whereNotNull('solution')->paginate(15);
        $activePage = "solved";

        return view('thread.index', compact('threads', 'activePage', 'tag_name'));
    }


    public function edit(Thread $thread)
    {
        return view('thread.edit', compact('thread'));
    }


    public function update(Request $request, Thread $thread)
    {
        $this->validate($request, [
            'subject' => 'required|min:10',
            'type' => 'required',
            'body' => 'required|min:20'
        ]);

        if(auth()->user()->id != $thread->user_id) 
        {
            abort(401, 'Unauthorized');
        }

        $thread->update($request->all());

        return redirect()->route('thread.show', $thread->id);
    }

    
    public function destroy(Thread $thread)
    {
        
        if(auth()->user()->id != $thread->user_id) 
        {
            abort(401, 'Unauthorized');
        }

        $thread->delete();

        return redirect()->route('thread.index');
    }

    public function like(Thread $thread, Request $request)
    {
        if ($thread->likedBy($request->user())) {
            return back();
        }

        $thread->likes()->create([
            'user_id' => $request->user()->id,
        ]);

        $thread->user->notify(new LikedThread($thread, $request->user()));
    
        return back();
    }

    public function unlike(Thread $thread, Request $request)
    {
        $request->user()->likes()->where('likeable_id', $thread->id)->delete();

        return back();
    }

    public function markSingleAsRead(Notification $notifId)
    {
      
        DB::table('notifications')->where('id', $notifId)->delete();

        return back();
    }

    public function markAsSolution(Request $request)
    {
        
        $thread = Thread::find($request->threadId);
        $thread->solution = $request->solutionId;

        if($thread->save()) {
            return back();
        }
    }

    public function unmarkAsSolution(Request $request)
    {
        
        $thread = Thread::find($request->threadId);
        $thread->solution = NULL;

        if($thread->save()) {
            return back();
        }
    }
}
