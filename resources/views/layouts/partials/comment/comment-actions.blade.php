{{-- Action buttons (edit and delete) --}}

<div class="flex justify-between">
    @auth
    <div class="mt-7 flex justify-between text-sm">
        @if(auth()->user()->id == $comment->user_id)
            <a class="text-red-900 hover:underline mr-5" href="#{{ $comment->id }}" onClick="toggleCommentModal('{{$comment->id}}')">Edit</a>
            
            {{-- Modal for updating comment on thread --}}
            <div class="bg-black bg-opacity-50 absolute inset-0 hidden justify-center items-center comment-overlay-{{$comment->id}}" id="{{$comment->id}}">
                <div class="bg-gray-100 p-6 shadow-xl w-4/12 rounded">
                    <div class="">
                        <div class="my-3 p-1 flex justify-between">
                            <span>Edit comment?</span>
                            <img src="{{ asset('cancel.png') }}" class="h-4 w-4 cursor-pointer comment-cancel-{{$comment->id}}"  alt="cancel" onClick="cancelModal('{{ $comment->id }}')">
                        </div>
                        <form action="{{ route('threadcomment.update', $comment->id) }}" method="post">
                            {{csrf_field()}}
                            {{method_field('put')}}
                
                            <div class="mb-4 max-w-lg">
                                <label for="body" class="sr-only">Body</label>
                                <textarea name="body" class="bg-white border-2 w-full p-4 rounded-lg @error('body') border-red-500 @enderror" id="body" placeholder="Your body" value="">{{$comment->body}}</textarea>

                                @error('body')
                                <div class="text-red-500 mt-2 text-sm">
                                    {{$message}}
                                </div>
                                @enderror

                                <div class="my-4 flex justify-end">
                                    <a class=" text-black px-4 py-3 rounded text-base w-32 cursor-pointer" onClick="closeCommentModal('{{$comment->id}}')">Close</a>
                                    <button type="submit" class="bg-blue-500 text-white px-3 py-2 rounded text-base w-32" id="save-btn">Save Changes</button>
                                </div>  
                            </div>
                        </form>
                    </div>
                </div>
            </div>            
             
            <form action="{{ route('threadcomment.destroy', $comment->id) }}" method="post">
                @csrf
                {{method_field('DELETE')}}
                <button type="submit" class="hover:underline text-red-900 mr-5">Delete</button>
            </form>
        @endif
            <a class="text-red-900 cursor-pointer hover:underline flex items-center mr-5" onClick="toggleReplies('{{$comment->id}}')">
                @if($comment->comments->count() > 0)
                    {{$comment->comments->count()}} {{ Str::plural('Reply', $comment->comments->count()) }}
                    <img src="{{ asset('down-arrow.png') }}" class="ml-1 h-4 w-4" id="first-arrow-{{$comment->id}}" alt="reply">
                    <img src="{{ asset('up-arrow.png') }}" class="ml-1 h-3 w-3 hidden" id="second-arrow-{{$comment->id}}" alt="reply">
                @else
                    <span>No replies yet</span>
                @endif
            </a>

            <a class="text-red-900 cursor-pointer hover:underline" onClick="toggleForm('{{$comment->id}}')">
                Add A Reply
            </a>
        </div>
        @endauth
        <div class="flex justify-between items-center text-sm">
            @auth
            @if(auth()->user()->id === $comment->commentable->user_id)
            <form action="{{ route('markAsSolution') }}" method="post">
                @csrf
                <input type="hidden" name="threadId" value="{{$thread->id}}">
                <input type="hidden" name="solutionId" value="{{$comment->id}}">
                <button type="submit" class="hover:underline text-red-900 mx-5">Mark as solution</button>
            </form>
            @endif
            @endauth
            <div class="flex justify-between items-center text-sm">
            <span class="text-gray-500 mr-1 text-base">{{ $comment->likes->count() }} {{ Str::plural('like', $comment->likes->count()) }}</span>
            @auth
            @if(!$comment->likedBy(auth()->user()))
                <form action="{{ route('threadcomment.like', $comment) }}" method="post" class="mr-3">
                    @csrf
                    <button type="submit" class="hover:bg-red-300 rounded">
                        <img src="{{ asset('heart2.png') }}" class="h-5 w-5" alt="logo">
                    </button>
                </form>
            @else
            <form action="{{ route('threadcomment.unlike', $comment) }}" method="post" class="mr-3">
                @csrf
                @method('DELETE')
                <button type="submit" class="hover:bg-red-300 rounded">
                    <img src="{{ asset('heart.png') }}" class="h-5 w-5" alt="logo">
                </button>
            </form>
            @endif
            @endauth
            </div>
        </div>
    </div>