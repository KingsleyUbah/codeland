@extends('layouts.auth')

@section('content')
     <div class="bg-yellow-200 text-center h-60 p-5 font-body">
         <div class="flex justify-around items-center max-w-lg mx-auto mt-5 mb-5">
            <img src="{{ asset('communities.png') }}" class="h-10 w-10" alt="">
            <h1 class="text-5xl mb-5">Join our community</h1>
        </div>
        <p class="text-xl">CodeLand is the largest community of web developers on the web. <br> We currently have over 3000 users, active in over 50 forums</p>
    </div>

    <div class="max-w-xl mx-auto my-32">
        <form action="{{ route('register') }}" method="post">
            @csrf
            <div class="mb-4">
                <label for="name" class="sr-only">Name</label>
                <input type="text" name="name" class="bg-gray-100 border-2 w-full p-4 rounded-lg @error('name') border-red-500 @enderror" id="name" placeholder="Your name" value="{{ old('name') }}">

                @error('name')
                    <div class="text-red-500 mt-2 text-sm">
                        {{$message}}
                    </div>
                @enderror
            </div>
            
            <div class="mb-4">
                <label for="username" class="sr-only">Username</label>
                <input type="text" name="username" class="bg-gray-100 border-2 w-full p-4 rounded-lg @error('username') border-red-500 @enderror" id="username" placeholder="Username" value="{{ old('username') }}">

                @error('username')
                    <div class="text-red-500 mt-2 text-sm">
                        {{$message}}
                    </div>
                @enderror
            </div>

            <div class="mb-4">
                <label for="email" class="sr-only">Email</label>
                <input type="email" name="email" class="bg-gray-100 border-2 w-full p-4 rounded-lg @error('email') border-red-500 @enderror" id="email" placeholder="Your email" value="{{ old('email') }}">

                @error('email')
                    <div class="text-red-500 mt-2 text-sm">
                        {{$message}}
                    </div>
                @enderror
            </div>

            <div class="mb-4">
                <label for="password" class="sr-only">Password</label>
                <input type="password" name="password" class="bg-gray-100 border-2 w-full p-4 rounded-lg @error('password') border-red-500 @enderror" id="password" placeholder="Choose a password" value="">

                @error('password')
                    <div class="text-red-500 mt-2 text-sm">
                        {{$message}}
                    </div>
                @enderror
            </div>

            <div class="mb-4">
                <label for="password_confirmation" class="sr-only">Confirm Password</label>
                <input type="password" name="password_confirmation" class="bg-gray-100 border-2 w-full p-4 rounded-lg" id="password_confirmation" placeholder="Repeat your password" value="">
            </div>

            <div>
                <button class="bg-blue-500 text-white px-4 py-3 rounded font-medium w-full">Join Codeland</button>
            </div>  
        </form>
    </div>
@endsection

