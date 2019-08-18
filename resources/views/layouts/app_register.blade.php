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
        @include('../includes/navmodals')

        <main class="register-wrapper back-register-img">
            @yield('content')
        </main>
        <div id="sign-in-button"></div><!-- for firebase -->
        {{-- @include('../includes/footer') --}}
    </div>
    


    <!--
    for login
    you may need jquery here (all.js has many DOM-elements, from index, and make Errors on Console.Log)
    therefore instead of "all.js" we include jquery.min.js and login.js if need   
    -->
    {{-- <script src="{{ asset('js/jquery-3.2.1.min.js') }}"></script> --}}
    <script src="{{ asset('js/all.js') }}"></script>
    <script src="{{ asset('js/login.js') }}"></script>

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

            $('.log_open').click(function() {
                $('.mod1').css('display','block')
            })

            $('.mod1 .close_modal').click(function() {
                $('.mod1').css('display','none')
            })

            
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
