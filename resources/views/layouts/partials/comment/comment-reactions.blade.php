<div class="flex justify-between items-center">    
        <a class="bg-gray-300 mr-3 rounded p-1 cursor-pointer" onClick="toggleForm('{{$comment->id}}')">Reply</a>

        <div>
        <span class="">{{ $comment->likes->count() }}</span>
        @auth
        @if(!$comment->likedBy(auth()->user()))
        <form action="{{ route('threadcomment.like', $comment) }}" method="post" class="mr-3">
            @csrf
            <button type="submit" class="rounded">Like</button>
        </form>
        @else
        <form action="{{ route('threadcomment.unlike', $comment) }}" method="post" class="mr-3">
            @csrf
            @method('DELETE')
            <button type="submit" class="rounded">Unlike</button>
        </form>
        @endif
        @endauth
        </div>
</div>