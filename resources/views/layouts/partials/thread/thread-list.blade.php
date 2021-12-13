{{-- Displays list of threads wherever it gets included --}}
<div>
    <div class="flex justify-between w-32 text-base items-center mb-4">
        <h3 class="font-bold mr-5">Showing:</h3>
            @if($activePage == "all")
            <a class="px-2 py-1 cursor-pointer bg-red-500 mr-5 text-white hover:bg-red-300 bg-red-500" href="{{ route('thread.index') }}">All</a>
            @else
            <a class="px-2 py-1 cursor-pointer mr-5 hover:bg-red-300" href="{{ route('thread.index') }}">All</a>
            @endif

            @if($activePage == "open")
            <a class="px-2 py-1 cursor-pointer mr-5 text-white hover:bg-red-300 bg-red-500" href="{{ route('thread.active') }}">Open</a>
            @else 
            <a class="px-2 py-1 cursor-pointer mr-5 hover:bg-red-300" href="{{ route('thread.active') }}">Open</a>
            @endif

            @if($activePage == "solved")
            <a class="px-2 py-1 cursor-pointer mr-5 text-white hover:bg-red-300 bg-red-500" href="{{ route('thread.closed') }}">Solved</a>
            @else
            <a class="px-2 py-1 cursor-pointer mr-5 hover:bg-red-300" href="{{ route('thread.closed') }}">Solved</a>
            @endif
    </div>
    @forelse($threads as $thread)
        <div class="bg-white my-2 flex relative hover:bg-gray-100">

            <div class="bg-gray-600 w-1 mr-1">

            </div>
            <div class="p-3 flex justify-between">
                <img src="{{ asset('profile.png') }}" class="h-full w-24 mr-5" alt="logo">
                <div>
                    <div class="flex justify-between mt-3">
                        <h1><a class="text-gray-700 text-2xl" href="{{ route('thread.show', $thread->id) }}">{{$thread->subject}}</a></h1>
                        <div class="flex justify-between absolute mt-2 top-5 right-12">
                            <img src="{{ asset('comment.png') }}" class="h-6 w-6" alt="logo">
                            <span class="text-base">{{ $thread->comments->count() }}</span>
                        </div>
                    </div>
                    <h5 class="text-sm my-3 italic">Posted {{$thread->created_at->diffForHumans()}} by 
                        <a href="{{ route('userprofile', $thread->user) }}" class="text-red-500 hover:text-red-400 hover:underline">{{$thread->user->name}}</a> in
                        @forelse($thread->tags as $tag)
                            <span class="bg-gray-700 p-1 rounded text-white mr-1">#{{ $tag->name}}</span>
                            @empty
                            <span>No category</span>
                        @endforelse
                    </h5>
                </div>
            </div>
        </div>
        
        @empty

        <div class="bg-white my-1 p-3">
            <h1>No threads</h1>
        </div>
            
    @endforelse
</div>