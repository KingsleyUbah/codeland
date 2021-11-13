<div class="flex justify-between items-center mr-7 mb-14 mt-14">    
        <div class="flex items-center">
        <span class="mr-3">{{ $thread->likes->count() }} {{ Str::plural('person', $thread->likes->count()) }} liked this</span>
        @auth
        @if(!$thread->likedBy(auth()->user()))
        <form action="{{ route('thread.like', $thread) }}" method="post" class="mr-3">
            @csrf
            <button type="submit" class="text-blue-500 bg-gray-300 p-1 rounded shadow-md">Like</button>
        </form>
        @else
        <form action="{{ route('thread.unlike', $thread) }}" method="post" class="mr-3">
            @csrf
            @method('DELETE')
            <button type="submit" class="text-red-500 bg-gray-300 p-1 rounded">Unlike</button>
        </form>
        @endif
        @endauth
        </div>
</div>
