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
    
    <h2>Replies</h2>
    @foreach($thread->comments as $comment)

        <div>
            <h3>{{$comment->body}}</h3>
            <p>{{$comment->user->name}}</p>
            <div class="w-24 my-7 flex justify-between" id="actions">
             <a class="p-1 rounded bg-blue-400" href="#{{ $comment->id }}" id="edit-btn">Edit</a>
            
             <div class="bg-black bg-opacity-50 absolute inset-0 hidden justify-center items-center overlay" id="{{$comment->id}}">
                <div class="bg-gray-100 p-6 shadow-xl w-4/12 rounded">
                    <div class="">
                        <div class="my-3 p-1 flex justify-between">
                            <span>Edit comment?</span>
                            <img src="{{ asset('cancel.png') }}" class="h-4 w-4 cursor-pointer" id="cancel-btn" alt="cancel">
                        </div>
                    <form action="{{ route('threadcomment.update', $comment->id) }}" method="post">
                        {{csrf_field()}}
                        {{method_field('put')}}
                        <div class="mb-4 max-w-lg">
                            <label for="body" class="sr-only">Body</label>
                            <textarea name="body" class="bg-gray-100 border-2 w-full p-4 rounded-lg @error('body') border-red-500 @enderror" id="body" placeholder="Your body" value="">{{$comment->body}}</textarea>

                            @error('body')
                            <div class="text-red-500 mt-2 text-sm">
                                {{$message}}
                            </div>
                            @enderror

                            <div class="my-4 flex justify-end">
                                <button type="submit" class=" text-black px-4 py-3 rounded text-base w-32" id="close-btn">Close</button>
                                <button type="submit" class="bg-blue-500 text-white px-3 py-2 rounded text-base w-32" id="save-btn">Save Changes</button>
                            </div>  
                        </div>
                    </form>
                    </div>
                </div>
             </div>            
            
             <form action="{{ route('threadcomment.destroy', $comment->id) }}" method="post">
                @csrf
                {{method_field('DELETE')}}
                <button type="submit" class="p-1 rounded bg-red-500 ml-5">Delete</button>
            </form>
            </div>
        <hr>
    </div>
    @endforeach
 
    <form action="{{ route('threadcomment.store', $thread->id) }}" method="post">
        {{csrf_field()}}
        <legend class="my-4">Form Title</legend>
        <div class="mb-4 max-w-lg">
                <label for="body" class="sr-only">Body</label>
                <textarea name="body" class="bg-gray-100 border-2 w-full p-4 rounded-lg @error('body') border-red-500 @enderror" id="body" placeholder="Your body" value=""></textarea>

                @error('body')
                    <div class="text-red-500 mt-2 text-sm">
                        {{$message}}
                    </div>
                @enderror

                <div class="my-4">
                    <button type="submit" class="bg-blue-500 text-white px-4 py-3 rounded font-medium w-full">Submit</button>
                </div>  
        </div>
    </form>
@endsection