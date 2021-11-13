{{-- This holds the details about a thread comment --}}
    <div class="p-4 flex items-start">
        <img src="{{ asset('profile.png') }}" class="h-12 w-12 mr-5" alt="picture">
        <div>
            <div class="flex justify-between items-start w-full">
                <h3 class="text-gray-900 font-bold">{{$comment->user->username}} - <span class="text-gray-500 italic">{{ Str::limit($comment->user->bio, 40) }}</span></h3>
                <h3 class="text-gray-500">{{$comment->created_at->diffForHumans()}}</h3>
            </div>
            <p>{{$comment->body}}</p>
            @include('layouts.partials.comment-reactions')
        </div>
    </div>      
