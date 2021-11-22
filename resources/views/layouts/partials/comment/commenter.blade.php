{{-- This holds the details about a thread comment --}}
    <hr class="border-gray-300">
    <div class="p-4 flex items-start w-full text-base">
        <img src="{{ asset('profile.png') }}" class="h-12 w-12 mr-5" alt="picture">
        <div class="w-full">
            <div class="flex justify-between items-start w-full mb-4">
                <div class="text-red-900"> <a href="{{ route('userprofile', $comment->user)}}" class="font-bold hover:underline">{{$comment->user->username}}</a>  <span class="text-gray-500 ml-3 text-base">{{ Str::limit($comment->user->bio, 40) }}</span></div>
                <h3 class="text-gray-500">{{$comment->created_at->shortRelativeDiffForHumans()}}</h3>
            </div>
            <p class="w-full mb-4">{{$comment->body}}</p>
            @include('layouts.partials.comment.comment-actions')
        </div>
    </div>      
