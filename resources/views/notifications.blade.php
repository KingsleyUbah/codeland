@extends('layouts.app')

@section('heading')
<h2 class="text-3xl font-heading">Notifications</h2>
@endsection

@section('topside')
@include('layouts.partials.sections.categories')
@endsection

@section('content')
        <div>
        @forelse(auth()->user()->unreadNotifications as $notification)
            @if($notification->type === "App\Notifications\RepliedToThread")
            <div class="bg-white p-3 my-2">
                <div class="flex justify-between">
                    <h5 class="text-lg my-3"> <a href="{{ route('userprofile', $notification->data['user']['username']) }}" class="text-gray-500 font-semibold hover:text-red-500">{{ $notification->data['user']['username'] }}</a> commented on <a href="{{ route('thread.show', $notification->data['thread']['id']) }}" class="text-gray-500 font-semibold hover:text-red-500">"{{ $notification->data['thread']['subject'] }}"</a></h5>
                    <span class="text-gray-500">
                        {{ \Carbon\Carbon::parse($notification->data['comment']['created_at'])->shortRelativeDiffForHumans() }}
                    </span>
                </div>
                <div class="border border-gray-300 rounded p-5 italic">
                    <p>{{ $notification->data['comment']['body'] }}</p>
                </div>
            </div>
            @else
            <div class="bg-white p-3 my-2">
                <h5 class="text-lg my-3"> 
                    <a href="{{ route('userprofile', $notification->data['user']['username']) }}" class="text-gray-500 font-semibold hover:text-red-500">{{ $notification->data['user']['username'] }}</a> 
                    reacted to 
                    <a href="{{ route('thread.show', $notification->data['thread']['id']) }}" class="text-gray-500 italic font-semibold hover:text-red-500">"{{ $notification->data['thread']['subject'] }}"</a> 
                    with 
                    <img src="{{ asset('heart.png') }}" class="h-5 w-5 inline" alt="logo">
                </h5>        
            </div>
            @endif
            @empty
                <div class="bg-white p-3">
                    <h5>No notifications yet</h5>
                </div>
            @endforelse
        </div>
@endsection