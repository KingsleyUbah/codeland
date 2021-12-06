@extends('layouts.app')

@section('topside')
@include('layouts.partials.sections.notifications')
{{-- Categories list --}}
<div class="my-2">
<h1 class="p-1 mb-1 font-body font-semibold">All Categories</h1>

<ul>
    @foreach($tags as $tag)
    <li class="mb-1">
        <a class="p-1 w-full hover:bg-red-500 hover:text-gray-100 flex justify-between items-center" href="{{ route('thread.index', ['tags'=>$tag->id]) }}"> 
            {{ $tag->name }}
        </a>
    </li>
    @endforeach
</ul>
</div>
@endsection

@section('section-heading')
<h2 class="text-3xl font-heading text-gray-700">{{$thread->subject}}</h2>
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
    
        @foreach($solutions as $solution)
        <div>
        <hr class="border-gray-300">
            <div class="p-4 flex items-start w-full text-base">
                <div>
                    <img src="{{ asset('profile.png') }}" class="h-12 w-12 mr-5" alt="picture">
                    <img src="{{ asset('tick.png') }}" class="h-10 w-10 mr-5 mt-5" alt="solved">
                </div>
                <div class="w-full">
                    <div class="flex justify-between items-start w-full mb-4">
                        <div class="text-red-900"> <a href="{{ route('userprofile', $solution->user)}}" class="font-bold hover:underline">{{$solution->user->username}}</a>  <span class="text-gray-500 ml-3 text-base">{{ Str::limit($solution->user->bio, 40) }}</span></div>
                        <h3 class="text-gray-500">{{$solution->created_at->shortRelativeDiffForHumans()}}</h3>
                    </div>
                    <p class="w-full mb-4">{{$solution->body}}</p>
                    @include('layouts.partials.comment.solution-actions')
                </div>
            </div>      
        </div>
        @endforeach

        @foreach($thread->comments as $comment)
        @if($comment->id === $thread->solution)
            @continue
        @else
            <div class="w-full" id="single-comment">
                @include('layouts.partials.comment.commenter')            
                <hr>
                @include('layouts.partials.reply.reply-form')
                @include('layouts.partials.reply.replies')
            </div>
        @endif
        @endforeach

@endsection