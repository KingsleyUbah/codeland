<?php

namespace App\Http\Controllers;

use App\Models\Thread;
use App\Models\Comment;
use App\Models\Tag;
use App\Models\Like;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;


class ThreadController extends Controller
{
    /*
    function __construct() 
    {
        $this.middleware('auth', ['except' => 'index']);
    }
    */
    
    
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if($request->has('tags')) {
            
            $tag = Tag::find($request->tags);
            $threads = $tag->threads;

        } else {

            $threads = Thread::paginate(15);
        }

        
        return view('thread.index', compact('threads'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('thread.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
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

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Thread  $thread
     * @return \Illuminate\Http\Response
     */
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
    
        $threads = Thread::whereNull('solution')->paginate(15);

        return view('thread.index', compact('threads'));
    }

    public function showClosed()
    {
    
        $threads = Thread::whereNotNull('solution')->paginate(15);

        return view('thread.index', compact('threads'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Thread  $thread
     * @return \Illuminate\Http\Response
     */
    public function edit(Thread $thread)
    {
        return view('thread.edit', compact('thread'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Thread  $thread
     * @return \Illuminate\Http\Response
     */
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

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Thread  $thread
     * @return \Illuminate\Http\Response
     */
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
}
