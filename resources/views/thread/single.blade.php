@extends('layouts.app')

@section('heading', "Thread")

@section('content')
    <h1>{{ $thread->subject }}</h1>
    <hr>
    <div>{!! \Michelf\Markdown::defaultTransform($thread->body) !!}</div>

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
@endsection