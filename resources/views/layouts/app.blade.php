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
    <div class="max-w-7xl mx-auto">
        <div class="flex justify-between mt-6 w-4/6 ml-96">
            <div class="">
                @yield('heading')
            </div>
            @auth
            <a class="px-3 py-1 mb-3 rounded text-white" href="{{route('thread.create')}}"><img src="{{ asset('createMes.png') }}" class="h-16 w-16" alt="logo"></a>
            @endauth
        </div>
    </div>

    <hr class="border-gray-300 max-w-7xl mx-auto">

    <div class="max-w-7xl p-6 mx-auto flex font-body items-center h-48 text-lg">
        <div class="w-2/6 h-full">
            @yield('topside')
        </div>
        <div class="w-4/6 h-full">
            @yield('section-heading')
        <hr>
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

<script>
    $(function () {
        $('#tag').selectize();
    })
</script>
