{{-- Code for Navigation menu --}}

<div class="bg-gray-700 h-2/6 shadow-lg">
        <nav class="flex max-w-7xl justify-between p-6 text-2xl h-2/6 mx-auto text-white" >
            <div class="flex justify-around items-center">
                <div class="flex justify-around items-center" >
                    <img src="{{ asset('codelandlogo.png') }}" class="h-9 w-9" alt="logo">
                    <h1 class="text-2xl font-semibold lowercase">Codeland</h1>
                </div>

                <ul class="flex justify-around items-center font-body text-base ml-6 mt-1">
                    <li class="">
                        <a href="/" class="mx-5 p-1 hover:text-red-400">Forum</a>
                    </li>
                    
                    <li class="">
                        <a href="/home" class="mx-5 p-1 hover:text-red-400">FAQS</a>
                    </li>
                </ul>
            </div>

            <ul class="flex justify-around items-center font-body text-base font-semibold">
                    @auth
                    <li class="mr-6">
                        <a href="{{ route('notifications') }}" class="flex justify-center">
                            <div class="hover:bg-gray-600 rounded-3xl p-1 flex items-start relative">
                                <img src="{{ asset('bell.png') }}" class="h-8 w-8" alt="notification">
                                @auth
                                @if(auth()->user()->unreadNotifications->count() > 0)
                                <span class="text-white font-body text-xs flex items-center rounded-lg h-6 w-5 relative right-4 -top-2 p-1 bg-red-500 border-gray-700 border">{{ count(auth()->user()->unreadNotifications) }}</span>
                                @endif
                                @endauth
                            </div>
                        </a>
                    </li>
                    <li>
                        <div>
                            <img src="{{ asset('profile.png') }}" class="h-8 w-8 prof" alt="notification">
                            <div class="p-1 bg-gray-700 border-gray-300 border-2 w-52 text-sm absolute z-10 hidden right-40 rounded mt-1" id="nav-overlay">
                                <ul>
                                    <li class="mb-2">
                                        <a href="" class="p-1 hover:bg-gray-500 px-2 hover:text-blue-300 block">
                                            <span>{{auth()->user()->name}}</span> <br>
                                            <span>{{auth()->user()->username}}</span>
                                        </a> 
                                        <hr class="border-gray-600">
                                    </li>
                                    <li class="mb-1">
                                        <a href="" class="hover:bg-gray-500 p-1 px-2 hover:text-blue-300 block">Dashboard</a>
                                    </li>
                                    <li class="mb-1">
                                        <a href="" class="hover:bg-gray-500 p-1 px-2 hover:text-blue-300 block">Create Post</a>
                                    </li>
                                    <li class="mb-1">
                                        <a href="" class="hover:bg-gray-500 p-1 mb-1 hover:text-blue-300 px-2 block">Settings</a>
                                    </li>
                                    <li class="mb-1">
                                        <hr class="border-gray-600">
                                        <form action="{{ route('logout') }}" method="post">
                                            @csrf
                                            <button class="hover:bg-gray-500 p-1 my-1 hover:text-blue-300 px-2 block w-full">Sign out</button>
                                        </form>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </li>
                    @endauth
            
                    @guest
                    <li class="mr-5" >
                        <a href="{{ route('register') }}" class="bg-red-500 rounded text-white p-1 px-2">Register</a>
                    </li>
                    <li class="">
                        <a href="{{ route('login') }}" class="bg-red-500 p-1 px-2 flex rounded text-white">Log In</a>
                    </li>
                    @endguest
                </ul>
        </nav>
    </div>