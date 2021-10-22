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
            <div class="flex justify-around items-center ml-20">
                <img src="{{ asset('codelandbars.png') }}" class="h-10 w-10" alt="">
                <h1 class="text-3xl ml-4 font-semibold lowercase">Codeland</h1>
            </div>
        </nav>
            @yield('content')
        <footer class="text-2xl bg-gray-700 text-white h-16" >
            <h1>Footer Content</h1>
        </footer>
    </div>
</body>
</html>