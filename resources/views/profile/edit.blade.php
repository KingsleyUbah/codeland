@extends('layouts.app')

@section('topside')
@include('layouts.partials.categories')
@endsection

@section('heading')
<h2 class="text-3xl font-heading">Edit Profile</h2>
@endsection

@section('content')
<div class="w-full">
            @if(session('message'))
                <div class="bg-green-500 p-4 rounded-lg mb-6 text-white text-center">
                    {{ session('message') }}
                </div>
            @endif
        <form action="{{ route('profile.update', $user) }}" method="post">
            @csrf
            {{method_field('put')}}
            <div class="mb-4">
                <h1 class="text-gray-500">Your Name:</h1>
                <label for="name" class="sr-only">Name</label>
                <input type="text" name="name" class="bg-white outline-none w-full p-4 @error('name') border-red-500 @enderror" id="name" placeholder="Your Name" value="{{auth()->user()->name}}">

                @error('name')
                    <div class="text-red-500 mt-2 text-sm">
                        {{$message}}
                    </div>
                @enderror
            </div>

            <div class="mb-4">
                <h1 class="text-gray-500">Your Username:</h1>
                <label for="username" class="sr-only">Username</label>
                <input type="text" name="username" class="bg-white outline-none w-full p-4 @error('username') border-red-500 @enderror" id="username" placeholder="Your Username" value="{{auth()->user()->username}}">

                @error('username')
                    <div class="text-red-500 mt-2 text-sm">
                        {{$message}}
                    </div>
                @enderror
            </div>

            <div class="mb-4">
                <h1 class="text-gray-500">Your Location:</h1>
                <label for="location" class="sr-only">Location</label>
                <input type="text" name="location" class="bg-white outline-none w-full p-4 @error('location') border-red-500 @enderror" id="location" placeholder="Your location (optional)" value="{{auth()->user()->name}}">

                @error('location')
                    <div class="text-red-500 mt-2 text-sm">
                        {{$message}}
                    </div>
                @enderror
            </div>
            
            <div class="mb-4">
                <h1 class="text-gray-500">Github Username:</h1>
                <label for="type" class="sr-only">Github Username</label>
                <input type="text" name="github" class="w-full p-4 @error('github') border-red-500 @enderror" id="type" placeholder="Your GitHub Username" value="{{auth()->user()->github}}">

                @error('github')
                    <div class="text-red-500 mt-2 text-sm">
                        {{$message}}
                    </div>
                @enderror
            </div>

            <div class="mb-4">
                <h1 class="text-gray-500">Bio:</h1>
                <label for="bio" class="sr-only">Bio</label>
                <textarea name="bio" class="bg-white outline-none w-full p-4 h-32 @error('body') border-red-500 @enderror" id="body" placeholder="Your body" value="">{{auth()->user()->bio}}</textarea>

                @error('bio')
                    <div class="text-red-500 mt-2 text-sm">
                        {{$message}}
                    </div>
                @enderror
            </div>

            <div class="mb-14">
                <h1 class="text-gray-500">Email:</h1>
                <label for="email" class="sr-only">Email</label>
                <input type="email" name="email" class="bg-white outline-none w-full p-4 @error('email') border-red-500 @enderror" id="email" placeholder="Your email" value="{{ auth()->user()->email }}">

                @error('email')
                    <div class="text-red-500 mt-2 text-sm">
                        {{$message}}
                    </div>
                @enderror
            </div>

            <h2 class="mb-2 text-2xl">Change your Password</h2>
            <div class="mb-4">
                <label for="old_password" class="sr-only">Old Password</label>
                <input type="password" name="old_password" class="w-full p-4 @error('old_password') border-red-500 @enderror" id="old_password" placeholder="Your old password">

                @error('old_password')
                    <div class="text-red-500 mt-2 text-sm">
                        {{$message}}
                    </div>
                @enderror
            </div>

            <div class="mb-6">
                <label for="new_password" class="sr-only">New Password</label>
                <input type="password" name="new_password" class="w-full p-4 @error('new_password') border-red-500 @enderror" id="password" placeholder="Choose a new password" value="">

                @error('new_password')
                    <div class="text-red-500 mt-2 text-sm">
                        {{$message}}
                    </div>
                @enderror
            </div>


            <div>
                <button class="bg-blue-500 text-white px-4 py-3 rounded font-medium w-full">Update</button>
            </div>  
        </form>
    </div>
@endsection