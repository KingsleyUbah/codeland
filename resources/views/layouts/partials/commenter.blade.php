{{-- This holds the details about a thread comment --}}
    <div class="p-4 flex items-start">
        <img src="{{ asset('profile.png') }}" class="h-12 w-12 mr-5" alt="picture">
        <div>
            <div class="flex justify-between items-start w-full mb-4">
                <h3 class="text-gray-900"> <a href="{{ route('userprofile', $comment->user)}}"class="font-bold hover:underline">{{$comment->user->username}}</a>  <span class="text-gray-500 ml-3 italic text-base">{{ Str::limit($comment->user->bio, 40) }}</span></h3>
                <h3 class="text-gray-500">{{$comment->created_at->diffForHumans()}}</h3>
            </div>
            <p>{{$comment->body}}</p>
            @include('layouts.partials.comment-actions')
        </div>
    </div>      
