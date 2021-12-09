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
            <div class="bg-white p-3 my-2">
                <h5 class="text-lg my-3"> <span class="text-red-500">{{ $notification->data['user']['username'] }}</span> commented on <a href="{{ route('thread.show', $notification->data['thread']['id']) }}" class="text-gray-600 italic">"{{ $notification->data['thread']['subject'] }}"</a></h5>
            </div>
            @empty
                <div class="bg-white p-3">
                    <h5>No notifications yet</h5>
                </div>
            @endforelse
        </div>
@endsection