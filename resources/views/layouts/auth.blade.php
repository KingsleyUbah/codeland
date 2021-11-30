<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CodeLand - No.1 Coding Forum</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}"> 
</head>
<body>    
    <div class="bg-gray-100">
        <nav class="w-full p-6 text-2xl bg-gray-700 text-white h-2/6" >
            <div class="max-w-7xl mx-auto">
                <div class="flex justify-start items-center w-1/6">
                    <img src="{{ asset('codelandlogo.png') }}" class="h-9 w-9" alt="">
                    <h1 class="text-2xl ml-2 font-semibold lowercase">Codeland</h1>
                </div>
            </div>
        </nav>
            @yield('content')
        <footer class="text-2xl bg-gray-700 text-white h-16" >
            <h1>Footer Content</h1>
        </footer>
    </div>
</body>
</html>