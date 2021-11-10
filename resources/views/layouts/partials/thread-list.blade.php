{{-- Displays list of threads wherever it gets included --}}
<div>
    @forelse($threads as $thread)
        <div class="bg-white my-2 flex relative">

            <div class="bg-gray-600 w-1 mr-1">

            </div>
            <div class="p-3 flex justify-between">
                <img src="{{ asset('profile.png') }}" class="h-full w-24 mr-6" alt="logo">
                <div>
                    <div class="flex justify-between">
                        <h1><a class="text-gray-700 text-2xl" href="{{ route('thread.show', $thread->id) }}">{{$thread->subject}}</a></h1>
                        <div class="flex justify-between absolute top-5 right-12">
                            <img src="{{ asset('comment.png') }}" class="h-6 w-6" alt="logo">
                            <span class="text-base">{{ $thread->comments->count() }}</span>
                        </div>
                    </div>
                    <h5 class="text-sm my-3 italic">Posted {{$thread->created_at->diffForHumans()}} by <a href="{{ route('userprofile', $thread->user) }}" class="text-red-500">{{$thread->user->name}}</a></h5>
                </div>
            </div>
        </div>
        
        @empty

        <div class="bg-white my-1 p-3">
            <h1>No threads</h1>
        </div>
            
    @endforelse
</div>