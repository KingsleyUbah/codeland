{{-- Notifications list --}}

@auth
@if(auth()->user()->unreadNotifications->count() > 0)
<div class="flex items-center w-24 mb-1">
    <h1 class="mr-3 font-body font-semibold">Notifications</h1>
    <span class="text-white font-body text-sm flex items-center rounded h-5 w-5 p-1 bg-red-500">{{ count(auth()->user()->unreadNotifications) }}</span>
</div>


<ul class="mb-5 text-base text-gray-700">
    @foreach(auth()->user()->unreadNotifications as $notification)
    <li class="mb-3">
        
            <a class="w-full bg-none hover:text-red-500 hover:underline" href="{{ route('markAsRead') }}"> 
                <span class="text-red-900 inline">{{ $notification->data['user']['username'] }}</span> commented on <span class="text-grey-400 italic">{{ Str::limit($notification->data['thread']['subject'], 40) }}</span>
            </a>
        
    </li>
    @endforeach

</ul>
<hr class="border-gray-300">
@endif
@endauth