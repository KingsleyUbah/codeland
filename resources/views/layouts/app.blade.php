<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CodeLand - No.1 Coding Forum</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}"> 
</head>
<body class="bg-gray-200">    
    @include('layouts.partials.navbar')    
    <div class="my-8">
        <div class="flex max-w-7xl justify-between">
            <div>
            
            </div>
            @auth
            <a class="px-3 py-1 bg-gray-700 mb-3 rounded text-white" href="{{route('thread.create')}}"><img src="{{ asset('new-message.png') }}" class="h-9 w-9" alt="logo"></a>
            @endauth
        </div>
    <hr class="max-w-7xl mx-auto">
    </div>
    <div class="max-w-7xl p-6 mx-auto flex font-body items-center h-48 text-lg">
        <div class="w-2/6 h-full">
            @yield('topside')
        </div>
        <div class="w-4/6 h-full">
            @yield('heading')
        <hr>
        @yield('content')
    </div>
    
</body>
</html>
<script src="{{ asset('js/main.js') }}"></script>