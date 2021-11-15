{{-- This is the replies pertaining to a single comment --}}

<div id="reply-{{$comment->id}}" class="ml-44 mt-6 text-base hidden border-solid border-2 border-gray-500">
    
    @foreach($comment->comments as $reply)
    <div class="p-4 flex items-start">
        <img src="{{ asset('profile.png') }}" class="h-12 w-12 mr-5" alt="picture">
        <div>
            <div class="flex justify-between items-start w-full">
                <h3 class="text-gray-900 font-bold">{{$reply->user->username}} - <span class="text-gray-500 italic">{{ Str::limit($reply->user->bio, 40) }}</span></h3>
                <h3 class="text-gray-500">{{$reply->created_at->diffForHumans()}}</h3>
            </div>
            <p>{{$reply->body}}</p>
            
        </div>
    </div>      

            {{-- Action buttons (edit and delete) --}}
            @auth
            @if(auth()->user()->id == $reply->user_id)
            <div class="w-24 my-7 flex justify-between" id="actions">
                <a href="#{{$reply->id}}" class="reply-edit-btn cursor-pointer" onClick="toggleReplyModal('{{$reply->id}}')"><img src="{{ asset('edit.png') }}" class="h-5 w-6" alt="editbutton"></a>
                    
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
                        <button type="submit" class="p-1 rounded bg-red-500 ml-5"><img src="{{ asset('bin.png') }}" class="h-4 w-5 cursor-pointer" id="cancel-btn" alt="cancel"></button>
                    </form>
        </div>
    @endif
@endauth
@endforeach

</div>
  