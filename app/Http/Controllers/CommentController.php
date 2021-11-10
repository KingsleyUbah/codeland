<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Thread;
use Illuminate\Http\Request;

class CommentController extends Controller
{

    public function addThreadComment(Request $request, Thread $thread) 
    {
        $this->validate($request, [
            'body'=>'required'
        ]);

        $comment = new Comment();
        $comment->body = $request->body;
        $comment->user_id = auth()->user()->id;


        $thread->comments()->save($comment);
        return back()->withMessage('Comment Created!');
    }

    public function likeThreadComment(Request $request, Comment $comment) 
    {
        if ($comment->likedBy($request->user())) {
            return back();
        }

        $comment->likes()->create([
            'user_id' => $request->user()->id,
        ]);
    
        return back();
    }

    public function unlikeThreadComment(Request $request, Comment $comment) 
    {
        $request->user()->likes()->where('likeable_id', $comment->id)->delete();

        return back();
    }


    public function addReplyComment(Request $request, Comment $comment) 
    {
        $this->validate($request, [
            'body'=>'required'
        ]);

        $reply = new Comment();
        $reply->body = $request->body;
        $reply->user_id = auth()->user()->id;


        $comment->comments()->save($reply);
        return back()->withMessage('Reply Created!');
    }
    
    
    public function updateThreadComment(Request $request, Comment $comment)
    {
        $this->validate($request, [
            'body'=>'required'
        ]);

        if(auth()->user()->id != $comment->user_id) 
        {
            abort(401, 'Unauthorized');
        }

        $comment->update($request->all());

        return back()->withMessage('Updated!');
    }

    public function updateReplyComment(Request $request, Comment $comment)
    {
        $this->validate($request, [
            'body'=>'required'
        ]);

        if(auth()->user()->id != $comment->user_id) 
        {
            abort(401, 'Unauthorized');
        }

        $comment->update($request->all());

        return back()->withMessage('Updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function deleteThreadComment(Comment $comment)
    {
        if(auth()->user()->id != $comment->user_id) 
        {
            abort(401, 'Unauthorized');
        }

        $comment->delete();

        return back()->withMessage('Deleted!');
    }

    public function deleteReplyComment(Comment $comment)
    {
        if(auth()->user()->id != $comment->user_id) 
        {
            abort(401, 'Unauthorized');
        }

        $comment->delete();

        return back()->withMessage('Deleted!');
    }
}
