<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>



    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/dash.css') }}" rel="stylesheet">

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Ubuntu:500,700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">


    <!-- lightgallery css -->
    <link rel="stylesheet" href="{{ asset('css/lg-transitions.min.css')}}">
    <link rel="stylesheet" href="{{ asset('css/lightgallery.css')}}">

    
    

    <style>
     body, html {
        font-family: 'Ubuntu', sans-serif;
     }
    </style>
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md bg-dark navbar-dark shadow-sm">
            <div class="container-fluid">
                <a class="navbar-brand border px-2 border-dark text-secondary" href="{{ url('/') }}">
                    {{ config('app.name', 'Laravel') }}
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">
                        <li class="nav-item">
                            <a href="{{route('admin.users', app()->getLocale())}}" class="nav-link bg-info mr-2 text-white text-center">Users</a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('admin.statements', app()->getLocale())}}" class="nav-link bg-info mr-2 text-white text-center">Statements</a>
                        </li>
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">                        
                        <!-- Language bar  -->
                        <!-- each route() has 1 params here -->
                        @if (Route::is('admin.statements.item'))
                        @foreach (config('app.available_locales') as $locale)
                        <li class="nav-item">
                            <a class="nav-link"
                            href="{{ route(\Illuminate\Support\Facades\Route::currentRouteName(), ['locale'=>$locale, 'id'=>$id]) }}"
                                @if (app()->getLocale() == $locale) style="font-weight: bold; text-decoration: underline" @endif>{{ strtoupper($locale) }}</a>
                        </li>
                        @endforeach   
                        @else
                        @foreach (config('app.available_locales') as $locale)
                        <li class="nav-item">
                            <a class="nav-link"
                            href="{{ route(\Illuminate\Support\Facades\Route::currentRouteName(), $locale) }}"
                                @if (app()->getLocale() == $locale) style="font-weight: bold; text-decoration: underline" @endif>{{ strtoupper($locale) }}</a>
                        </li>
                        @endforeach                            
                        @endif
                        


                        <!-- Authentication Links -->
                        @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login', app()->getLocale()) }}">{{ __('Login') }}</a>
                            </li>
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register', app()->getLocale()) }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout', app()->getLocale()) }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout', app()->getLocale()) }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4" >
            @yield('content')
        </main>
    </div>

    
    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
    <script src="{{ asset('js/libs/lightgallery.min.js')}}"></script>

    <!-- lightgallery plugins -->
    <script src="{{ asset('js/libs/lg-thumbnail.min.js')}}"></script>
    <script src="{{ asset('js/libs/lg-share.min.js')}}"></script>
    <script src="{{ asset('js/libs/lg-zoom.min.js')}}"></script>
    <script src="{{ asset('js/libs/lg-pager.min.js')}}"></script>
    <script src="{{ asset('js/libs/lg-autoplay.min.js')}}"></script>
    <script>
        lightGallery(document.getElementById('lightgallery'));        
    </script>
    @if ($route_name === 'admin.statements.item')
        <script>
            console.log('admin.statements.item');
            $(function (){
                $('#statement_status').on('change', function(){
                    let val = $('#statement_status').val();
                    if(val < 0) {
                        $('#message-wrap').css('display','block')
                    }else{        
                        // $('#message').val('');
                        $('#message-wrap').css('display','none')
                    }
                });
            });        
        </script>
    @endif
    
</body>
</html>
