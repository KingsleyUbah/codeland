{{-- This holds the details about a thread comment --}}

<div id="commenter" class="" >
    <div class="bg-gray-300 w-full rounded p-4 flex items-center">
        <img src="{{ asset('profile.png') }}" class="h-12 w-12 mr-5" alt="picture">
        <h3 class="text-gray-900">{{$comment->user->username}} 2 minutes ago</h3>
    </div>      
        
    <div class="p-4">
        <p>{{$comment->body}}</p>
    </div>
</div>