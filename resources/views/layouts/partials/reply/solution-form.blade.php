{{-- This is the form for posting a reply on a solution. It is hidden my default, and is toggled by clicking a link --}}

<div class="reply-form-{{$solution->id}} hidden mt-6">
    <form action="{{ route('replycomment.store', $comment->id) }}" method="post">
        {{csrf_field()}}
            <legend class="my-4">Reply to {{$comment->user->username}}</legend>
            <div class="mb-4 max-w-lg">
                <label for="body" class="sr-only">Body</label>
                <textarea name="body" class="bg-white border-2 w-full p-4 rounded-lg @error('body') border-red-500 @enderror" id="body" placeholder="Your body" value=""></textarea>
  
                @error('body')
                    <div class="text-red-500 mt-2 text-sm">
                        {{$message}}
                    </div>
                @enderror
  
                <div class="my-4">
                    <button type="submit" class="bg-blue-500 text-white px-4 py-3 rounded font-medium w-full">Submit</button>
                </div>
            </div>
    </form>
</div>
