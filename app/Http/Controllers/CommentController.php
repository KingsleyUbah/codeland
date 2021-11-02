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
    
    
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Comment  $comment
     * @return \Illuminate\Http\Response
     */
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
}
