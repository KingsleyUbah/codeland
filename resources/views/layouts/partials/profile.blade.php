{{-- Profile view --}}

<div>
    <img src="{{ asset('profile.png') }}" class="h-full w-5/6" alt="picture">
</div>

<div class="font-body mt-6">
    <div class="flex items-center justify-between w-5/6 mb-4 ">
        <h2 class="text-3xl">{{$user->username}}</h2>
        <a href="{{ route('profile.edit', $user) }}" class="profile-edit"><img src="{{ asset('pencil.png') }}" class="h-6 w-6 mr-4" alt="edit"></a>
    </div>
    <div class="flex">
        <img class="mr-2 h-6 w-6" src="{{ asset('location.png') }}" alt="location"> 
        <h5 class="italic mb-4">{{$user->location}}</h5>
    </div>
    <p class="mb-4 w-full">{{$user->bio}}</p>
    <button class="px-3 py-2 bg-gray-700 text-white">Visit GitHub Profile</button>
</div>