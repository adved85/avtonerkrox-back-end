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
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/common.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'Laravel') }}
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Language bar  -->
                        <!-- each route() has 1 params here -->
                        @foreach (config('app.available_locales') as $locale)
                        <li class="nav-item">
                            <a class="nav-link"
                            href="{{ route(\Illuminate\Support\Facades\Route::currentRouteName(), $locale) }}"
                                @if (app()->getLocale() == $locale) style="font-weight: bold; text-decoration: underline" @endif>{{ strtoupper($locale) }}</a>
                        </li>
                        @endforeach


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

        <main class="py-4">
            @yield('content')
        </main>
        <div id="sign-in-button"></div><!-- for firebase -->
    </div>


    <!--
    for login
    you may need jquery here (all.js has many DOM-elements, from index, and make Errors on Console.Log)
    therefore instead of "all.js" we include jquery.min.js and login.js if need   
    -->

    <script src="{{ asset('js/jquery-3.2.1.min.js') }}"></script>

    <!-- The core Firebase JS SDK is always required and must be listed first -->
    <script src="https://www.gstatic.com/firebasejs/6.3.1/firebase-app.js"></script>

    <!-- SDKs for Firebase products that you want to use -->
    <script src="https://www.gstatic.com/firebasejs/6.3.1/firebase-auth.js"></script>
    <script src="https://www.gstatic.com/firebasejs/6.3.1/firebase-firestore.js"></script>

    <script src="{{ asset('js/firebase-init.js') }}"></script>

    <script defer>
        // apply user's browser language
        firebase.auth().useDeviceLanguage();

        // Set up the reCAPTCHA verifier
        window.recaptchaVerifier = new firebase.auth.RecaptchaVerifier('sign-in-button', {
            'size': 'invisible',
            'callback': function(response) {
                // reCAPTCHA solved, allow signInWithPhoneNumber.
                onSignInSubmit();
            }
        });

        function getCode(event) {
            event.preventDefault();
            if(isPhoneNumberValid()) {
                var phoneNumber = getPhoneNumberFromUserInput();
                var appVerifier = window.recaptchaVerifier;

                firebase.auth().signInWithPhoneNumber(phoneNumber, appVerifier)
                .then(function (confirmationResult) {
                    console.log(confirmationResult)
                    document.getElementById('sms-wassend').style.display = 'block';

                    // SMS sent. Prompt user to type the code from the message, then sign the
                    // user in with confirmationResult.confirm(code).
                    window.confirmationResult = confirmationResult;
                }).catch(function (error) {
                    // Error; SMS not sent
                    // ...
                    console.log(' phoneNumber is invalid there')
                    console.log(error)
                    document.getElementById('sms-notsend').style.display = 'block';
                });
            }
            else{
                console.log(' phoneNumber is invalid here')
                document.getElementById('sms-notsend').style.display = 'block';
            }
            

        }

        function verifyNumber(event) {
            event.preventDefault()
            var code = getCodeFromUserInput();
            if(window.confirmationResult) {
                confirmationResult.confirm(code).then(function (result) {
                // User signed in successfully.
                var user = result.user;
                console.log(result);
                document.getElementById('code-valid').style.display = 'block';
                if(document.getElementById('submit-regis-btn').hasAttribute('disabled')) {
                    document.getElementById('submit-regis-btn').removeAttribute('disabled')
                }
                
                window.codeConfirmed = true;
                // return true;
                }).catch(function (error) {
                // User couldn't sign in (bad verification code?)
                console.log(error);
                document.getElementById('code-notvalid').style.display = 'block';
                if(!document.getElementById('submit-regis-btn').hasAttribute('disabled')) {
                    document.getElementById('submit-regis-btn').setAttribute('disabled')
                }
                window.codeConfirmed = false;
                });
                
            }else{
                document.getElementById('show-instruction').style.display = 'block';
                if(!document.getElementById('submit-regis-btn').hasAttribute('disabled')) {
                    document.getElementById('submit-regis-btn').setAttribute('disabled')
                }
                window.codeConfirmed = false;
                // return false;
            }
            

        }


        function getCodeFromUserInput() {
            return document.getElementById('verification-code').value;
        }


        function getPhoneNumberFromUserInput() {
            return document.getElementById('phone-number').value;
        }


        function isPhoneNumberValid() {
            var pattern = /^\+[0-9\s\-\(\)]+$/;
            var phoneNumber = getPhoneNumberFromUserInput();
            return phoneNumber.search(pattern) !== -1;
        }

        // $.noConflict();
        $(document).ready(function(){
            $('#phone-number').focus(function() {
                     $('#sms-notsend').css('display','none');
                $('#show-instruction').css('display','none');
            });

            $('#verification-code').focus(function() {
                 $('#code-notvalid').css('display','none'); 
                    $('#sms-wassend').css('display','none');
                $('#show-instruction').css('display','none');
            });

            
        });
        function checkCode() {
            return true;
        }

        function doAlert(event) {            
            // alert('form submited');
            if(!window.codeConfirmed) {
                event.preventDefault();
                document.getElementById('show-instruction').style.display = 'block';
            }
        }

    </script>
</body>
</html>
