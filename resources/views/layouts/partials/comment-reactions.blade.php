<div class="flex justify-end items-center mr-7">    
        <span class="mr-3">{{ $comment->likes->count() }} {{ Str::plural('person', $comment->likes->count()) }} liked this</span>
        
        @if(!$comment->likedBy(auth()->user()))
        <form action="{{ route('threadcomment.like', $comment) }}" method="post" class="mr-3">
            @csrf
            <button type="submit" class="text-blue-500 bg-gray-300 p-1 rounded">Like</button>
        </form>
        @else
        <form action="{{ route('threadcomment.unlike', $comment) }}" method="post" class="mr-3">
            @csrf
            @method('DELETE')
            <button type="submit" class="text-red-500 bg-gray-300 p-1 rounded">Unlike</button>
        </form>
        @endif

        <a class="bg-gray-300 mr-3 rounded p-1 cursor-pointer" onClick="toggleForm('{{$comment->id}}')">Reply</a>
</div>