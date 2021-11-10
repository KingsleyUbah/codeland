@extends('layouts.app')

@section('heading')
<h2 class="mb-7 text-3xl font-heading">Latest threads by {{$user->username}}</h2>
@endsection

@section('topside')
@include('layouts.partials.profile')
@endsection

@section('content')
        <div>
            @forelse ($threads as $thread)
            <div class="bg-white p-3 my-2">
                <h3 ><a class="text-gray-700 text-3xl" href="{{ route('thread.show', $thread->id) }}">{{$thread->subject}}</a></h3>
                <h5 class="text-base my-3 italic">Posted {{$thread->created_at->diffForHumans()}} by <span class="text-red-500">{{$thread->user->username}}</span></h5>
            </div>
            @empty
                <h5>No threads yet</h5>

            @endforelse
        </div>


        <h2 class="mb-7 mt-14 text-3xl font-heading">Latest Comments by {{$user->username}}</h2>

        <div>
            @forelse ($comments as $comment)
                <div class="bg-white p-3 my-2">
                    <h5 class="text-lg my-3"> <span class="text-red-500">{{$user->username}}</span> commented on <a href="" class="text-gray-600 italic">"{{$comment->commentable->subject}}"</a> <br>{{$comment->created_at->diffForHumans()}}</h5>
                </div>
            @empty
                <div class="bg-white p-3">
                    <h5>No comments yet</h5>
                </div>
            @endforelse
        </div>

@endsection