@extends('layouts.app')

@section('topside')
@include('layouts.partials.sections.categories')
@endsection

@section('heading')
<h2 class="text-3xl font-heading">Create Thread</h2>
@endsection

@section('content')
<div class="w-full">
            @if(session('message'))
                <div class="bg-green-500 p-4 rounded-lg mb-6 text-white text-center">
                    {{ session('message') }}
                </div>
            @endif
        <form action="{{ route('thread.store') }}" method="post">
            @csrf
            <div class="mb-4">
                <label for="subject" class="sr-only">Subject</label>
                <input type="text" name="subject" class="bg-white w-full outline-none p-4  @error('subject') border-red-500 @enderror" id="subject" placeholder="Write topic" value="{{ old('subject') }}" required>

                @error('subject')
                    <div class="text-red-500 mt-2 text-sm">
                        {{$message}}
                    </div>
                @enderror
            </div>
            
            <div class="mb-4">
                <label for="type" class="sr-only">Tags</label>
                <select type="text" name="tags[]" id="tag" multiple class="bg-white w-full p-4 outline-none @error('tags') border-red-500 @enderror" id="type" placeholder="Select categories" value="{{ old('tagd') }}">    
                    @foreach($tags as $tag)
                        <option class="bg-gray-500 text-white p-5 my-5" value="{{ $tag->id }}">{{ $tag->name }}</option>
                    @endforeach
                </select>

                <div class="flex mt-2 justify-between">
                @error('tags')
                    <div class="text-red-500 text-sm">
                        {{$message}}
                    </div>
                @enderror

                    <div class="text-gray-700 text-sm italic">
                        Select two or more tags which relates to your thread
                    </div>
                </div>
            </div>

            <div class="mb-4">
                <label for="body" class="sr-only">Body</label>
                <textarea name="body" class="bg-white w-full p-4 h-64 outline-none @error('body') border-red-500 @enderror" id="body" placeholder="Your body" required>{{ old('body') }}</textarea>

                @error('body')
                    <div class="text-red-500 mt-2 text-sm">
                        {{$message}}
                    </div>
                @enderror
            </div>

            <div>
                <button class="bg-blue-500 text-white px-8 py-5 font-medium w-full">Submit</button>
            </div>  
        </form>
    </div>
@endsection