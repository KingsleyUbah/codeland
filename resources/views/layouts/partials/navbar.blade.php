{{-- Code for Navigation menu --}}

<div class="bg-gray-700 h-2/6">
        <nav class="flex max-w-7xl justify-between p-6 text-2xl h-2/6 mx-auto bg-gray-700 text-white h-16" >
            <div class="flex justify-around items-center">
                <div class="flex justify-around items-center" >
                    <img src="{{ asset('codelandlogo.png') }}" class="h-9 w-9" alt="logo">
                    <h1 class="text-2xl font-semibold lowercase">Codeland</h1>
                </div>

                <ul class="flex justify-around items-center font-body text-base ml-6 mt-1">
                    <li class="">
                        <a href="/" class="mx-5 p-1 hover:text-red-500">Forum</a>
                    </li>
                    
                    <li class="">
                        <a href="/home" class="mx-5 p-1 hover:text-red-500">FAQS</a>
                    </li>
                </ul>
            </div>

            <ul class="flex justify-around items-center font-body text-base">
                    @auth
                    <li class="mx-6">
                        <a class="flex justify-between items-center" href=""><img src="{{ asset('notifications.png') }}" class="h-8 w-8" alt="icon"><span class="p-1 bg-white text-red-500">{{ count(auth()->user()->unreadNotifications) }}</span></a>
                    </li>
                    <li class="mr-6">
                        <a href="{{ route('userprofile', auth()->user()) }}" class="text-red-500 p-1 px-2">{{auth()->user()->name}}</a>
                    </li>
                    <li>
                        <form action="{{ route('logout') }}" method="post">
                            @csrf
                            <button type="submit" class="bg-red-500 p-1 flex rounded text-white">Log out</button>
                        </form>
                    </li>
                    @endauth
            
                    @guest
                    <li class="mr-5" >
                        <a href="{{ route('register') }}" class="bg-red-500 rounded text-white p-1 px-2">Register</a>
                    </li>
                    <li class="">
                        <a href="{{ route('login') }}" class="bg-red-500 p-1 flex rounded text-white">Log In</a>
                    </li>
                    @endguest
                </ul>
        </nav>
    </div>