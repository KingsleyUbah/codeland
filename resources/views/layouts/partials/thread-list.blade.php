<h2>Threads</h2>

    <div>
           @forelse($threads as $thread)
                <div class="bg-gray-100 my-1">
                    <h1><a href="{{ route('thread.show', $thread->id) }}">{{$thread->subject}}</a></h1>
                </div>
            
            @empty

                <div>No threads</div>
            
            @endforelse
    </div>