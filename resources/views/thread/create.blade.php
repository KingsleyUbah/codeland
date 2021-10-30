@extends('layouts.app')

@section('heading', "Create Thread")

@section('content')
<div class="max-w-lg">
            @if(session('message'))
                <div class="bg-green-500 p-4 rounded-lg mb-6 text-white text-center">
                    {{ session('message') }}
                </div>
            @endif
        <form action="{{ route('thread.store') }}" method="post">
            @csrf
            <div class="mb-4">
                <label for="subject" class="sr-only">Subject</label>
                <input type="text" name="subject" class="bg-gray-100 border-2 w-full p-4 rounded-lg @error('subject') border-red-500 @enderror" id="subject" placeholder="Write topic" value="{{ old('subject') }}">

                @error('subject')
                    <div class="text-red-500 mt-2 text-sm">
                        {{$message}}
                    </div>
                @enderror
            </div>
            
            <div class="mb-4">
                <label for="type" class="sr-only">Type</label>
                <input type="text" name="type" class="bg-gray-100 border-2 w-full p-4 rounded-lg @error('type') border-red-500 @enderror" id="type" placeholder="topic type" value="{{ old('type') }}">

                @error('type')
                    <div class="text-red-500 mt-2 text-sm">
                        {{$message}}
                    </div>
                @enderror
            </div>

            <div class="mb-4">
                <label for="body" class="sr-only">Body</label>
                <textarea name="body" class="bg-gray-100 border-2 w-full p-4 rounded-lg @error('body') border-red-500 @enderror" id="body" placeholder="Your body" value="{{ old('body') }}"></textarea>

                @error('body')
                    <div class="text-red-500 mt-2 text-sm">
                        {{$message}}
                    </div>
                @enderror
            </div>

            <div>
                <button class="bg-blue-500 text-white px-4 py-3 rounded font-medium w-full">Submit</button>
            </div>  
        </form>
    </div>
@endsection