<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CodeLand - No.1 Coding Forum</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}"> 
</head>
<body class="bg-gray-100">    
    @include('layouts.partials.navbar')    
    <div class="my-8">
        <div class="flex max-w-7xl justify-between">
            <div>
            
            </div>
            <a class="p-2 bg-blue-400 mb-3" href="{{route('thread.create')}}">Create thread</a>
        </div>
    <hr class="max-w-7xl mx-auto">
    </div>
    <div class="max-w-7xl p-6 mx-auto flex font-body items-center h-48 text-lg">
        <div class="bg-gray-100 w-2/6 h-full">
            @include('layouts.partials.categories')
        </div>
        <div class="w-4/6 h-full ml-">
        <h2 class="mb-7 text-4xl">@yield('heading')</h2>
        @yield('content')
    </div>
    
</body>
</html>
<script src="{{ asset('js/main.js') }}"></script>