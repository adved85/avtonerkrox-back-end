<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    {{-- <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet"> --}}

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    {{-- <link href="{{ asset('css/common.css') }}" rel="stylesheet"> --}}

    <!-- from index -->
    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('img/apple-touch-icon.png') }}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('img/favicon-32x32.png') }}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('img/favicon-16x16.png') }}">
    <link rel="shortcut icon" href="{{ asset('img/favicon.ico') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    {{-- <link rel="stylesheet" href="{{ asset('css/slick-theme.css') }}"> --}}
    {{-- <link rel="stylesheet" href="{{ asset('css/slick.css') }}"> --}}
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
    <link rel="stylesheet" href="{{ asset('css/common.css') }}">
</head>
<body>
    <div id="app">
        <!-- auth-name 3 params -->
        <nav>
        <section class="nav container">
            <div class="logo">
    
                <h1><a href="{{ route('index',app()->getLocale())}}">
                    <img src="{{ asset('img/logo1.png') }}" style="width: 120px;">
                </a></h1>
            </div>
            <div class="menu-btn">
                <div class="menu-btn">
                    <span></span>
                </div>
            </div>
            <ul class="nav_menu">
                <li><a href="{{ route('index',app()->getLocale())}}">Գլխավոր</a></li>
                <li><a href="{{ route('about',app()->getLocale())}}">Մեր մասին</a></li>
                <li><a href="{{route('all_cars', app()->getLocale())}}">Մեքենաներ</a></li>
                <!-- <li><a href="rent_car.html">Վարձակալություն</a></li> -->
                <li><a href="{{route('contacts',app()->getLocale())}}">Կապ</a></li>
            </ul>
            <div class="login_block">
                @guest
                <a href="#" class="log_open mobileLog"></a>
                <a href="#" class="reg_open mobileReg"></a>
                            
                <a href="#" class="log_open">{{ __('Login') }}</a>
                <a class="reg_open2" href="{{ route('register', app()->getLocale()) }}">{{ __('Register') }}</a>
                {{-- <a href="#" class="reg_open">Գրանցում</a> --}}
    
                @else
                <a href="{{ route('home', app()->getLocale()) }}">{{ Auth::user()->name }}</a>
    
                <a href="{{ route('logout', app()->getLocale()) }}" class="log_close"
                    onclick="event.preventDefault(); document.getElementById('logout-form').submit();">                
                    <img src="{{ asset('img/logout.png')}}" alt="logout.png" style="width:15px">
                    {{ __('Logout') }}
                </a>
                <form id="logout-form" action="{{ route('logout', app()->getLocale()) }}" method="POST" style="display: none;">
                    @csrf
                </form>
                @endguest
            </div>
            <div class="languages">
                @foreach (config('app.available_locales') as $locale)
                
                    <a class="lang" title="{{config('app.al_data')[$locale]['title']}}"
                    href="{{ route(\Illuminate\Support\Facades\Route::currentRouteName(),['locale'=>$locale,'token'=>$token]) }}"
                        @if (app()->getLocale() == $locale) style="filter: brightness(1.5);" @endif>
                        <img src="{{ asset('img/'.config('app.al_data')[$locale]['img'].'.png') }}"
                            alt="{{config('app.al_data')[$locale]['img']}}" 
                            @if (app()->getLocale() == $locale) style="box-shadow: -2px -4px 3px -2px;" @endif>
                    </a>
                
                @endforeach
                {{-- <a href="{{url("/am")}}" class="lang" title="Հայերեն">
                    <img src="{{ asset('img/ARM.png') }}" alt="arm">
                </a>
                <a href="{{url("/ru")}}" class="lang" title="Русский">
                    <img src="{{ asset('img/RUS.png') }}" alt="rus">
                </a>
                <a href="{{url("/en")}}" class="lang" title="English">
                    <img src="{{ asset('img/ENG.png') }}" alt="eng">
                </a> --}}
            </div>
        </section>
        </nav>
        <!-- reg_login modals -->
        <div class="modal mod1">
            <div class="modal_item">
                <div class="form_top">
                    <h3> <img src="{{ asset('img/locked.png') }}" alt="lock"> Մուտք</h3>
                    <div class="close_modal">
                        <img src="{{ asset('img/close.png') }}" alt="close" title="Փակել">
                    </div>
                </div>
        
                {{-- <form name="login">
                    <input type="text" placeholder="Մուտքանուն կամ էլ. հասցե">
                    <input type="password" placeholder="Գաղտնաբառ">
                    <button class="loginBtn">Մուտք</button>
                    <a href="recover_profile.html">Վերականգնել հաշիվը</a>
                </form> --}}
                <form method="POST" action="{{ route('login', app()->getLocale()) }}" name="login" onsubmit="loginUser(event)">
                    @csrf
                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus placeholder="{{ __('E-Mail Address')}}">
                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password" placeholder="{{ __('Password')}}">
                    <input type="hidden" name="app_url" value="{{ config('app.url') }}">
                    <span class="invalid-feedback" id="loginErrorMsg">{{ __('auth.failed') }}</span>
                    {{-- <a href="recover_profile.html">Վերականգնել հաշիվը</a> --}}
                    <button type="submit" class="loginBtn">
                        {{ __('Login') }}
                    </button>
                    @if (Route::has('password.request'))
                        <a class="btn btn-link" href="{{ route('password.request', app()->getLocale()) }}">
                            {{ __('Forgot Your Password?') }}
                        </a>
                    @endif
                </form>
            </div>
        </div>


        <main class="reset-update-wrapper">
            @yield('content')           
        </main>
        {{-- @include('../includes/footer') --}}
    </div>
    <script src="{{ asset('js/all.js') }}"></script>
    <script src="{{ asset('js/login.js') }}"></script>
    <script>
    $(document).ready(function(){
        $('.log_open').click(function() {
                $('.mod1').css('display','block')
            })

            $('.mod1 .close_modal').click(function() {
                $('.mod1').css('display','none')
            })
    })
    </script>
</body>
</html>