@extends('layouts.app')

@section('heading', "Thread")

@section('content')
    <h1>{{ $thread->subject }}</h1>
    <hr>
    <div>{!! \Michelf\Markdown::defaultTransform($thread->body) !!}</div>

    @auth
    @if(auth()->user()->id == $thread->user_id)
    <div class="w-24 my-7 flex justify-between" id="actions">
        <a class="p-2 rounded-md bg-blue-400" href="{{ route('thread.edit', $thread->id) }}">Edit</a>
        <form action="{{ route('thread.destroy', $thread->id) }}" method="post">
            @csrf
            {{method_field('DELETE')}}
            <button type="submit" class="p-2 rounded-md bg-red-500 ml-5">Delete</button>
        </form>
    </div>
    @endif
    @endauth

    <a class="bg-none mt-6 w-44 inline-block flex items-center" onClick="toggleCommentForm()">Reply<img src="{{ asset('reply.png') }}" class="h-4 w-4 ml-1" alt=""></a>

    @include('layouts.partials.comment-form')
    
    <h2 class="m-6">Replies to <span class="bg-blue-100 p-1 rounded">{{$thread->subject}}</span></h2>
   
    @foreach($thread->comments as $comment)

        <div class="ml-32 p-3">
            <div id="single" class="bg-white flex justify-between shadow-xl p-5 m-3 rounded text-base">

              @include('layouts.partials.commenter')
              @include('layouts.partials.comment-actions')
            
            </div>

            <br>
            <hr>

            @include('layouts.partials.reply-form')

            @include('layouts.partials.replies')
      </div>
    @endforeach
@endsection