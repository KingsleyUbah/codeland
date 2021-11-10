@extends('layouts.app')

@section('topside')
@include('layouts.partials.categories')
@endsection

@section('heading')
<h2 class="mb-7 text-4xl font-heading">{{$thread->subject}}</h2>
@endsection

@section('content')
    <div>{!! \Michelf\Markdown::defaultTransform($thread->body) !!}</div>

    @auth
    @if(auth()->user()->id == $thread->user_id)
    <div class="w-24 my-7 flex justify-between" id="actions">
        <a class="text-gray-500" href="{{ route('thread.edit', $thread->id) }}">Edit</a>
        <form action="{{ route('thread.destroy', $thread->id) }}" method="post">
            @csrf
            {{method_field('DELETE')}}
            <button type="submit" class="text-gray-500 ml-5">Delete</button>
        </form>
    </div>
    @endif
    @endauth

    @include('layouts.partials.thread-reactions')

    @include('layouts.partials.comment-form')
    
    <h2 class="m-6 font-heading">Replies to <span class="bg-blue-100 p-1 rounded">{{$thread->subject}}</span></h2>
   
    @foreach($thread->comments as $comment)

        <div class="p-3">
            <div id="single" class="m-3 rounded text-base">

              @include('layouts.partials.commenter')
              @include('layouts.partials.comment-actions')
              @include('layouts.partials.comment-reactions')
            
            </div>

            <br>
            <hr>

            @include('layouts.partials.reply-form')

            @include('layouts.partials.replies')
      </div>
    @endforeach
@endsection