@extends('layouts.app')

@section('heading', "Update Thread")

@section('content')
<div class="max-w-lg">
            @if(session('message'))
                <div class="bg-green-500 p-4 rounded-lg mb-6 text-white text-center">
                    {{ session('message') }}
                </div>
            @endif
        <form action="{{ route('thread.update', $thread->id) }}" method="post">
            @csrf
            {{method_field('put')}}
            <div class="mb-4">
                <label for="subject" class="sr-only">Subject</label>
                <input type="text" name="subject" class="bg-gray-100 border-2 w-full p-4 rounded-lg @error('subject') border-red-500 @enderror" id="subject" placeholder="Write topic" value="{{$thread->subject}}">

                @error('subject')
                    <div class="text-red-500 mt-2 text-sm">
                        {{$message}}
                    </div>
                @enderror
            </div>
            
            <div class="mb-4">
                <label for="type" class="sr-only">Type</label>
                <input type="text" name="type" class="bg-gray-100 border-2 w-full p-4 rounded-lg @error('type') border-red-500 @enderror" id="type" placeholder="topic type" value="{{$thread->type}}">

                @error('type')
                    <div class="text-red-500 mt-2 text-sm">
                        {{$message}}
                    </div>
                @enderror
            </div>

            <div class="mb-4">
                <label for="body" class="sr-only">Body</label>
                <textarea name="body" class="bg-gray-100 border-2 w-full p-4 rounded-lg @error('body') border-red-500 @enderror" id="body" placeholder="Your body" value="">{{$thread->body}}</textarea>

                @error('body')
                    <div class="text-red-500 mt-2 text-sm">
                        {{$message}}
                    </div>
                @enderror
            </div>

            <div>
                <button class="bg-blue-500 text-white px-4 py-3 rounded font-medium w-full">Update</button>
            </div>  
        </form>
    </div>
@endsection