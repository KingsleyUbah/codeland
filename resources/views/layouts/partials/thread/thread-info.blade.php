<div class="flex border-2 border-gray-500 w-full my-6 p-2">
                <div class="mr-5">
                    <h1 class="text-red-900 text-base">created</h1>
                    <div>
                        <img src="{{ asset('profile.png') }}" class="h-4 w-4 mr-2 inline" alt="picture">
                        <span class="text-lg text-gray-500">{{$thread->created_at->shortRelativeDiffForHumans()}}</span>
                    </div>
                </div>
                <div class="mr-5">
                    <h1 class="text-red-900 text-base">last reply</h1>
                    <div>
                        <img src="{{ asset('profile.png') }}" class="h-4 w-4 mr-2 inline" alt="picture">
                        @if($comment == null)
                        <span class="text-lg text-gray-500">N/A</span>
                        @else
                        <span class="text-lg text-gray-500">{{ $comment->created_at->shortRelativeDiffForHumans()}}</span>
                        @endif
                    </div>
                </div>
                <div class="mr-5">
                    <h1 class="text-lg text-red-900">{{ $thread->comments->count()}}</h1>
                    <span class="text-gray-500 text-base">replies</span>
                </div>
                <div class="mr-5">
                    <h1 class="text-lg text-red-900">{{ $thread->count }}</h1>
                    <span class="text-gray-500 text-base">views</span>
                </div>
                <div class="mr-5">
                    <h1 class="text-lg text-red-900">11</h1>
                    <span class="text-gray-500 text-base">users</span>
                </div>
                <div class="mr-5">
                    <h1 class="text-lg text-red-900">{{ $thread->likes->count()}}</h1>
                    <span class="text-gray-500 text-base">likes</span>
                </div>
                @if($solutions->count() > 0)
                <div class="mr-5">
                    <h1 class="text-lg text-green-600">{{ $solutions->count()}}</h1>
                    <span class="text-gray-500 text-base">solutions</span>
                </div>
                @endif
            </div>
