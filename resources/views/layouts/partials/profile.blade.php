{{-- Profile view --}}

<div>
    <img src="{{ asset('profile.png') }}" class="h-full w-5/6" alt="picture">
</div>

<div class="font-body mt-6">
    <h2 class="mb-4 text-3xl">{{$user->username}}</h2>
    <div class="flex">
        <img class="mr-2 h-6 w-6" src="{{ asset('location.png') }}" alt="location"> 
        <h5 class="italic mb-4">Lagos, Nigeria</h5>
    </div>
    <p class="mb-4 w-5/6">I am a software developer from New Zealand. I write about web development, software development and programming in general</p>
    <button class="p-3 bg-gray-700 text-white">Visit GitHub Profile</button>
</div>