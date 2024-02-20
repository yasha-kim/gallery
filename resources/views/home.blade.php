<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Montserrat" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js">
    <link rel="stylesheet" href="{{asset('css/tailwind.css')}}">
    
    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
    
</head>
<body>
    <div id="app">
        @include('layouts.navigation')

        <main class="py-4">
            <div class="columns-1 gap-2 space-y-4 p-4 sm:columns-2 md:columns-3 lg:columns-4">
                @foreach (App\Models\Pin::with('user')->get() as $pin) 
                <div class="relative mb-1 before:content-[''] before:rounded-md before:absolute before:inset-0 before:bg-black before:bg-opacity-20">
                <img class="w-full rounded-full" src="images/{{$pin->path}}">
                    <div class="test__body absolute inset-0 p-8 text-white flex flex-col">
                        <div class="relative">
                            <a class="test__link absolute inset-0" href="{{route('pin.show', ['id' => $pin->id])}}"></a>
                            <h1 class="test__title text-md font-bold mb-2">{{$pin->judulfoto}}</h1>
                        </div>
                        
                    </div>

                </div>
                @endforeach
            </div>
        </main>
    </div>
</body>
</html>



