<div class="flex justify-between my-7">
    @auth
        <div class="w-24 flex justify-between" id="actions">
            @if(auth()->user()->id == $thread->user_id)
                <a class="text-red-900 hover:underline" href="{{ route('thread.edit', $thread->id) }}">Edit</a>
                <form action="{{ route('thread.destroy', $thread->id) }}" method="post">
                    @csrf
                    {{method_field('DELETE')}}
                    <button type="submit" class="hover:underline text-red-900 mx-5">Delete</button>
                </form>
            @endif
                <a class="text-red-900 cursor-pointer hover:underline" onClick="toggleCommentForm()">Reply</a>
        </div>
    @endauth
        <div class="flex items-center">
            <span class="mr-1 text-gray-500">{{ $thread->likes->count() }}</span>
                @if(auth()->user() === null || !$thread->likedBy(auth()->user()))
                    <form action="{{ route('thread.like', $thread) }}" method="post" class="mr-3">
                        @csrf
                        <button type="submit" class="text-blue-500 rounded shadow-md">
                            <img src="{{ asset('heart2.png') }}" class="h-5 w-5" alt="logo">
                        </button>
                    </form>
                @else
                    <form action="{{ route('thread.unlike', $thread) }}" method="post" class="mr-3">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="text-red-500 rounded">
                            <img src="{{ asset('heart.png') }}" class="h-5 w-5" alt="logo">
                        </button>
                    </form>
                @endif
        </div>
    </div>
</div>
