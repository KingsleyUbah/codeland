{{-- This is the for storing a thread comment --}}

<form action="{{ route('threadcomment.store', $thread) }}" method="post" class="hidden w-5/6" id="thread-comment-form">
    {{csrf_field()}}
    <legend class="my-4">{{$thread->subject}}</legend>
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

<hr class="border-gray-300">
