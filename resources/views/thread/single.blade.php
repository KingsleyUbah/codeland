@extends('layouts.app')

@section('topside')
@include('layouts.partials.categories')
@endsection

@section('section-heading')
<h2 class="text-4xl font-heading">{{$thread->subject}}</h2>
<p class="mb-4 text-gray-500 text-base">Tags: 
    @forelse($thread->tags as $tag)
        <span>#{{ $tag->name}}</span>
    @empty
        <span>No tags</span>
    @endforelse
</p>

<hr class="border-gray-300 mb-3">
@endsection

@section('content')

    <div class="flex items-start" >
        <img src="{{ asset('profile.png') }}" class="h-12 w-12 mr-5" alt="picture">
        <div class="w-full">
            <div class="flex justify-between items-start w-full">
                <h3 class="text-gray-900 font-bold">{{$thread->user->username}}</h3>
                <h3 class="text-gray-500">{{$thread->created_at->diffForHumans()}}</h3>
            </div>
            <div class="mt-8">{!! \Michelf\Markdown::defaultTransform($thread->body) !!}</div>
        </div>
    </div>
    
    <div class="flex justify-between">
    @auth
        <div class="w-24 my-7 flex justify-between" id="actions">
        @if(auth()->user()->id == $thread->user_id)
            <a class="text-gray-500 hover:underline" href="{{ route('thread.edit', $thread->id) }}">Edit</a>
            <form action="{{ route('thread.destroy', $thread->id) }}" method="post">
                @csrf
                {{method_field('DELETE')}}
                <button type="submit" class="hover:underline text-gray-500 mx-5">Delete</button>
            </form>
        @endif
            <a class="text-gray-500 cursor-pointer hover:underline" onClick="toggleCommentForm()">Reply</a>
        </div>
    @endauth
        <div class="flex items-center">
            <span class="mr-3">{{ $thread->likes->count() }} {{ Str::plural('person', $thread->likes->count()) }} liked this</span>
            @auth
            @if(!$thread->likedBy(auth()->user()))
            <form action="{{ route('thread.like', $thread) }}" method="post" class="mr-3">
                @csrf
                <button type="submit" class="text-blue-500 bg-gray-300 p-1 rounded shadow-md">Like</button>
            </form>
            @else
            <form action="{{ route('thread.unlike', $thread) }}" method="post" class="mr-3">
                @csrf
                @method('DELETE')
                <button type="submit" class="text-red-500 bg-gray-300 p-1 rounded">Unlike</button>
            </form>
            @endif
            @endauth
        </div>
    </div>

    @include('layouts.partials.comment-form')
    
    <hr class="border-gray-300">

    @foreach($thread->comments as $comment)
        <div class="w-11/12">

            @include('layouts.partials.commenter')
            @include('layouts.partials.comment-actions')
            

            <br>
            <hr>

            @include('layouts.partials.reply-form')

            @include('layouts.partials.replies')
      </div>
    @endforeach
@endsection