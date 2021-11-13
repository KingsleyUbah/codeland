{{-- Modal for updating user profile --}}
    <div class="bg-black bg-opacity-50 absolute inset-0 hidden justify-center items-center profile-overlay">
    <div class="bg-gray-100 p-6 shadow-xl w-4/12 rounded">
                            <div class="">
                                <div class="my-3 p-1 flex justify-between">
                                    <span>Edit comment?</span>
                                    <img src="{{ asset('cancel.png') }}" class="h-4 w-4 cursor-pointern reply-cancel-btn"  alt="cancel">
                                </div>
                                
                                <form action="" method="post">
                                    {{csrf_field()}}
                                    {{method_field('put')}}
                                    <div class="mb-4 max-w-lg">
                                        <label for="body" class="sr-only">Body</label>
                                        <textarea name="body" class="bg-white border-2 w-full p-4 rounded-lg @error('body') border-red-500 @enderror" id="body" placeholder="Your body" value=""></textarea>
                                            @error('body')
                                                <div class="text-red-500 mt-2 text-sm">
                                                    {{$message}}
                                                </div>
                                            @enderror
  
                                        <div class="my-4 flex justify-end">
                                            <a class=" text-black px-4 py-3 rounded text-base w-32 reply-close-btn cursor-pointer" >Close</a>
                                            <button type="submit" class="bg-blue-500 text-white px-3 py-2 rounded text-base w-32">Save Changes</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
    </div>            