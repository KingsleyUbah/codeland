{{-- This is the replies pertaining to a single comment --}}

<div id="reply-{{$comment->id}}" class="ml-44 mt-6 text-base hidden border-solid border border-gray-300">
    
    @foreach($comment->comments as $reply)
    <div class="p-4 flex items-start w-full">
        <img src="{{ asset('profile.png') }}" class="h-12 w-12 mr-5" alt="picture">
        <div class="w-full">
            <div class="flex justify-between items-start w-full mb-4">
                <div> <a href="{{ route('userprofile', $reply->user) }}" class="text-red-900 font-bold hover:underline">{{$reply->user->username}}</a> <span class="text-gray-500 ml-3 text-base">{{ Str::limit($reply->user->bio, 40) }}</span></div>
                <h3 class="text-gray-500">{{$reply->created_at->diffForHumans()}}</h3>
            </div>
            <p class="mb-4">{{$reply->body}}</p>
            
            {{-- Action buttons (edit and delete) --}}
            
            @auth
            @if(auth()->user()->id == $reply->user_id)
            <div class="flex justify-start items-center">
                <a href="#{{$reply->id}}" class="reply-edit-btn text-red-900 hover:underline" onClick="toggleReplyModal('{{$reply->id}}')">Edit</a>
                    
                {{-- Modal for updating reply --}}
                    <div class="bg-black bg-opacity-50 absolute inset-0 hidden justify-center items-center reply-overlay-{{$reply->id}}" id="{{$reply->id}}">  
                        <div class="bg-gray-100 p-6 shadow-xl w-4/12 rounded">
                            <div class="">
                                <div class="my-3 p-1 flex justify-between">
                                    <span>Edit comment?</span>
                                    <img src="{{ asset('cancel.png') }}" class="h-4 w-4 cursor-pointern reply-cancel-btn"  alt="cancel">
                                </div>
                                
                                <form action="{{ route('replycomment.update', $reply) }}" method="post">
                                    {{csrf_field()}}
                                    {{method_field('put')}}
                                    <div class="mb-4 max-w-lg">
                                        <label for="body" class="sr-only">Body</label>
                                        <textarea name="body" class="bg-white border-2 w-full p-4 rounded-lg @error('body') border-red-500 @enderror" id="body" placeholder="Your body" value="">{{$reply->body}}</textarea>
                                            @error('body')
                                                <div class="text-red-500 mt-2 text-sm">
                                                    {{$message}}
                                                </div>
                                            @enderror
  
                                        <div class="my-4 flex justify-end">
                                            <a class=" text-black px-4 py-3 rounded text-base w-32 reply-close-btn cursor-pointer" onClick="closeReplyModal('{{$reply->id}}')" >Close</a>
                                            <button type="submit" class="bg-blue-500 text-white px-3 py-2 rounded text-base w-32">Save Changes</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>

  
                <form action="{{ route('replycomment.destroy', $reply) }}" method="post">
                    @csrf
                    {{method_field('DELETE')}}
                    <button type="submit" class="hover:underline text-red-900 mx-5">Delete</button>
                </form>
            </div>
    @endif
@endauth
        </div>
    </div>      
@endforeach

</div>
  