<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CodeLand - No.1 Coding Forum</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}"> 
</head>
<body class="bg-white-100">    
    <div class="container">
        <nav class="flex justify-between p-6 text-2xl bg-gray-700 text-white h-16" >
            <div class="flex justify-around items-center ml-10">
                <img src="{{ asset('codelandbars.png') }}" class="h-10 w-10" alt="">
                <h1 class="text-3xl ml-4 font-semibold lowercase">Codeland</h1>
            </div>

            <ul class="flex justify-between items-center font-serif uppercase text-base">
                @auth
                <li class="mx-5 p-1 text-yellow-50"><a href="/home">FAQS</a></li>
                <li class="mx-5 p-1 bg-yellow-50 text-gray-700" ><a href="{{ route('register') }}">Kingsley Ubah</a></li>
                <li class="mx-5 p-1" ><a href="/home">Log Out</a></li>
                @endauth
            
                @guest
                <li class="mx-5 p-1 text-yellow-50"><a href="/home">FAQS</a></li>
                <li class="mx-5 p-1" ><a href="{{ route('register') }}">Register</a></li>
                <li class="mx-5 p-1 bg-yellow-50 text-gray-700" ><a href="/home">Log In</a></li>
                @endguest
            </ul>
        </nav>
            <h1>Haha</h1>
            @yield('content')
    

        
        <footer class="text-2xl bg-gray-700 text-white h-16" >
            <h1>Footer Content</h1>
        </footer>
    </div>
</body>
</html>