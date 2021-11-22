@extends('layouts.app')

@section('topside')
@include('layouts.partials.sections.notifications')
{{-- Categories list --}}

<h1 class="mb-1 font-heading">All Categories</h1>

<ul>
    @foreach($tags as $tag)
    <li class="mb-1">
        <a class="p-1 w-full hover:bg-red-500 hover:text-gray-100 flex justify-between items-center" href="{{ route('thread.index', ['tags'=>$tag->id]) }}"> 
            {{ $tag->name }}
        </a>
    </li>
    @endforeach
</ul>
@endsection

@section('section-heading')
<h2 class="text-3xl font-heading">{{$thread->subject}}</h2>
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
            <div class="flex justify-between items-start w-full mb-4">
                <h3 class="text-gray-900 font-bold">{{$thread->user->username}}</h3>
                <h3 class="text-gray-500">{{$thread->created_at->diffForHumans()}}</h3>
            </div>
            <div>
                {!! \Michelf\Markdown::defaultTransform($thread->body) !!}
            </div>

            @include('layouts.partials.thread.thread-info')
            
            @include('layouts.partials.thread.thread-actions')
        </div>
    
        @include('layouts.partials.comment.comment-form')
    

        @foreach($thread->comments as $comment)
            <div class="w-full" id="single-comment">

                @include('layouts.partials.comment.commenter')
            
                <br>
                <hr>

                @include('layouts.partials.reply.reply-form')

                @include('layouts.partials.reply.replies')
            </div>
        @endforeach
@endsection