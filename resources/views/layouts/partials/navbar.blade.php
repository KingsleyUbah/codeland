<div class="bg-gray-700 h-2/6">
        <nav class="flex max-w-7xl justify-between p-6 text-2xl h-2/6 mx-auto bg-gray-700 text-white h-16" >
            <div class="flex justify-around items-center">
                <img src="{{ asset('codelandlogo.png') }}" class="h-9 w-9" alt="logo">
                <h1 class="text-2xl font-semibold lowercase">Codeland</h1>
            </div>

            <ul class="flex justify-between items-center font-body text-base">
                @auth
                <li class="">
                    <a href="/home" class="mx-5 p-1 hover:text-red-500">FAQS</a>
                </li>
                <li class="" >
                    <form action="{{ route('logout') }}" method="post">
                        @csrf
                        <button type="submit" class="border-red-500 mx-5 hover:text-red-400 border-solid border-2 p-1 px-2 rounded-md">Log out</button>
                    </form>
                </li>
                <li class="">
                    <a href="/home" class="bg-red-500 w-40 p-1 px-2 flex rounded-md text-white mx-5"><img src="{{ asset('codelandadmin.png') }}" class="h-6 w-6" alt="">Edit Profile</a>
                </li>
                @endauth
            
                @guest
                <li class="">
                    <a href="/home" class="mx-5 p-1 hover:text-blue-100">FAQS</a>
                </li>
                <li class="" >
                    <a href="{{ route('register') }}" class="border-blue-100 mx-5 hover:text-yellow-200 border-solid border-2 p-1 px-2 rounded-md">Register</a>
                </li>
                <li class="">
                    <a href="{{ route('login') }}" class="bg-blue-100 w-24 p-1 px-2 flex rounded-md text-gray-700 mx-5"><img src="{{ asset('codelanduser.png') }}" class="h-6 w-6" alt="">Log In</a>
                </li>
                @endguest
            </ul>
        </nav>
    </div>