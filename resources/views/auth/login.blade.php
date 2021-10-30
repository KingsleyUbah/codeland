@extends('layouts.auth')

@section('content')
     <div class="bg-yellow-200 text-center h-60 p-5 font-body">
         <div class=" max-w-lg mx-auto mt-5 mb-5">
            <h1 class="text-5xl mb-5">Welcome Back!</h1>
        </div>
        <p class="text-xl">Please log in to join the discussion</p>
    </div>

    <div class="max-w-xl mx-auto my-32">
        @if(session('status'))
            <div class="bg-red-500 p-4 rounded-lg mb-6 text-white text-center">
                {{ session('status') }}
            </div>
        @endif
        <form action="{{ route('login') }}" method="post">
            @csrf
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
                <div class="flex items-center">
                    <input type="checkbox" name="remember" id="remember" class="mr-2">
                    <label for="remember">Remember Me</label>
                </div>
            </div> 

            <div>
                <button class="bg-blue-500 text-white px-4 py-3 rounded font-medium h-full w-full">Log In</button>
            </div>  
        </form>
    </div>
@endsection

