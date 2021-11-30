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
                        <a href="{{ route('userprofile', auth()->user()) }}" class="flex justify-center">
                            <div class="hover:bg-gray-500 rounded-3xl p-2">
                                <img src="{{ asset('bell.png') }}" class="h-8 w-8" alt="notification">
                            </div>
                        </a>
                    </li>
                    <li>
                        <div>
                            <img src="{{ asset('profile.png') }}" class="h-8 w-8" alt="notification">
                            <div class="p-1 bg-black w-52 text-base hidden">
                                <ul>
                                    <li class="mb-2">
                                        <a href="" class="p-1 hover:bg-gray-500 px-2 block">
                                            <span>{{auth()->user()->name}}</span> <br>
                                            <span>{{auth()->user()->username}}</span>
                                        </a> 
                                        <hr class="border-gray-600">
                                    </li>
                                    <li class="mb-1">
                                        <a href="" class="hover:bg-gray-500 p-1 px-2 hover:text-blue-300 block">Dashboard</a>
                                    </li>
                                    <li class="mb-1">
                                        <a href="" class="hover:bg-gray-500 p-1 px-2 block">Create Post</a>
                                    </li>
                                    <li class="mb-1">
                                        <a href="" class="hover:bg-gray-500 p-1 mb-1 px-2 block">Settings</a>
                                    </li>
                                    <li class="mb-1">
                                        <hr class="border-gray-600">
                                        <a href="" class="hover:bg-gray-500 p-1 my-1 px-2 block">Sign out</a>
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