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
    @include('layouts.partials.sections.navbar')    
    <div class="max-w-7xl mx-auto h-20 flex justify-between divide-x divide-gray-300 items-center">
            <div class="w-3/12 p-5">
                 
            </div>
            <div class="w-9/12 flex items-center justify-between p-5">
                <div class="">
                    @yield('heading')
                </div>
                @auth
                <a class="rounded shadow bg-blue-800 p-2 text-white" href="{{route('thread.create')}}">Create Thread</a>
                @endauth
            </div>
    </div>

    <hr class="border-gray-300 max-w-7xl mx-auto">

    <div class="max-w-7xl h-full divide-x divide-gray-300 mx-auto flex font-body items-start text-lg">
        <div class="w-3/12 h-full p-5">
            @yield('topside')
        </div>
        <div class="w-9/12 h-full p-5">
            @yield('section-heading')
            
            @yield('content')
        </div>
    </div>
    
</body>
</html>
<script src="{{ asset('js/main.js') }}"></script>
<script
  src="https://code.jquery.com/jquery-3.6.0.min.js"
  integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4="
  crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/selectize.js/0.13.3/js/standalone/selectize.min.js" integrity="sha512-pF+DNRwavWMukUv/LyzDyDMn8U2uvqYQdJN0Zvilr6DDo/56xPDZdDoyPDYZRSL4aOKO/FGKXTpzDyQJ8je8Qw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>


