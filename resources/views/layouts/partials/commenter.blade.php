{{-- This holds the details about a thread comment --}}

<div id="commenter" class="flex" >
    <div class="bg-gray-400 w-1 mr-3">

    </div>      
        
    <div>
        <h3 class="text-gray-400 mb-3">{{$comment->user->username}} - 2 minutes ago</h3>
        <p>{{$comment->body}}</p>
        <a class="bg-none mt-6 text-gray-400 w-44 inline-block flex items-center" onClick="toggleForm('{{$comment->id}}')">Reply<img src="{{ asset('reply.png') }}" class="h-4 w-4 ml-1" alt=""></a>
    </div>
</div>