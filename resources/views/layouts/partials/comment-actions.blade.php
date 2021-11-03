{{-- Action buttons (edit and delete) --}}

<div class="w-24 mr-1/3 flex justify-between" id="actions">
    <a class="p-1" href="#{{ $comment->id }}" id="edit-btn"><img src="{{ asset('edit.png') }}" class="h-5 w-6 cursor-pointer" id="cancel-btn" alt="cancel"></a>
            
    {{-- Modal for updating comment on thread --}}
    <div class="bg-black bg-opacity-50 absolute inset-0 hidden justify-center items-center overlay" id="{{$comment->id}}">
        <div class="bg-gray-100 p-6 shadow-xl w-4/12 rounded">
            <div class="">
                <div class="my-3 p-1 flex justify-between">
                    <span>Edit comment?</span>
                    <img src="{{ asset('cancel.png') }}" class="h-4 w-4 cursor-pointer" id="cancel-btn" alt="cancel">
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
                            <button type="submit" class=" text-black px-4 py-3 rounded text-base w-32" id="close-btn">Close</button>
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
        <button type="submit" class="p-1 rounded bg-red-400 ml-5"><img src="{{ asset('bin.png') }}" class="h-4 w-5 cursor-pointer"  alt="cancel"></button>
    </form>
</div>