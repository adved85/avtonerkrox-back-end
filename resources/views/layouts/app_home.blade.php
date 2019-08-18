  <!-- resources/views/layouts/app.blade.php -->

  <!DOCTYPE html>
  <html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>  
      <!-- CSS и JavaScript -->
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <meta http-equiv="x-ua-compatible" content="ie=edge">
      <meta name="robots" content="index">
      <meta name="robots" content="follow">
      <meta name="description" content="">
      <meta name="keywords" content="">
      <title>{{ config('app.name', 'Laravel') }}</title>
      <meta name="csrf-token" content="{{ csrf_token() }}">
      
 
    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('img/apple-touch-icon.png') }}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('img/favicon-32x32.png') }}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('img/favicon-16x16.png') }}">
    <link rel="shortcut icon" href="{{ asset('img/favicon.ico') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    {{-- <link rel="stylesheet" href="{{ asset('css/slick-theme.css') }}"> --}}
    {{-- <link rel="stylesheet" href="{{ asset('css/slick.css') }}"> --}}
    
    <link rel="stylesheet" href="{{ asset('css/common.css') }}">
    {{-- <link rel="stylesheet" href="{{ asset('css/personal.css')}}"> --}}
    
    
    <link href="{{ asset('css/app.css') }}" rel="stylesheet"> 
    <script src="{{ asset('js/app.js') }}" defer></script>   
  
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
    <link href="https://fonts.googleapis.com/css?family=Ubuntu:500,700&display=swap" rel="stylesheet">
    

    @if (Route::is('home') || Route::is('home.statement.edit'))
    {{-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css"> --}}
    <link href="https://gitcdn.github.io/bootstrap-toggle/2.2.2/css/bootstrap-toggle.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">   
    @endif

    <style>
    body, html {
            font-family: 'Ubuntu', sans-serif;
        }
    </style>
    </head>
  
    <body>
      {{-- <div class="container"></div> --}}
      
        <main class="home-wrapper">
            @include('../includes/navmodals' )
            @yield('content')
        </main>
        
        <script src="{{ asset('js/jquery-3.2.1.min.js')}}"></script>
        {{-- <script src="{{ asset('js/all.js') }}"></script> --}}
        {{-- <script src="{{ asset('js/login.js') }}"></script> --}}
        {{-- <script src="{{ asset('js/script.js')}}"></script> --}}
        
        @if (Route::is('home'))
          <script defer src="https://gitcdn.github.io/bootstrap-toggle/2.2.2/js/bootstrap-toggle.min.js"></script>
          {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script> --}}
          <script>
            console.log('home')
            $(function(){

              $('#make_id').on('change', function() {
                
                if($(this).val() > 0) {
                  models = carmodels.filter((item)=>{
                    return item.make_id == Number($(this).val()) 
                  })
                  // console.log(models);
                  if(models.length > 0) {
                    let options = models.map((item)=>{
                      // console.log(`<option value="${item.id}"> ${item.title}</option>`);
                      
                      return(
                        `<option value="${item.id}"> ${item.title}</option>`
                      )
                    })
                    // console.log(options);
                    options.unshift(`<option value="0">${select_any}</option`);
                    $('#model_id').html(options)
                    $('#model_id').removeAttr('disabled')                    
                  }
                  
                }else{                  
                  $('#model_id').html(`<option value="0">${select_any}</option`)
                  $('#model_id').attr('disabled',true)
                }
              });

              // after submit-reload
              $('#make_id').on('click',function(){
                if($('#model_id').attr('disabled') === 'disabled'){
                  if($(this).val() > 0) {
                    models = carmodels.filter((item)=>{
                      return item.make_id == Number($(this).val()) 
                    })
                    // console.log(models);
                    if(models.length > 0) {
                      let options = models.map((item)=>{
                        return(
                          `<option value="${item.id}"> ${item.title}</option>`
                        )
                      })
                      // console.log(options);
                      options.unshift(`<option value="0">${select_any}</option`);
                      $('#model_id').html(options)
                      $('#model_id').removeAttr('disabled')                    
                    }
                    
                  }else{                  
                    $('#model_id').html(`<option value="0">${select_any}</option`)
                    $('#model_id').attr('disabled',true)
                  }
                }
              });
              

              $('#mileage').on('keydown', function(event){
                let key = String.fromCharCode(event.which);
                let eWhich = event.which;                              
                if(key >= '0' && key <= 9 || eWhich ===8 || eWhich===46 || eWhich === 37 || eWhich === 39) {
                  return true;
                }else{
                  event.preventDefault();
                }
              });

              $('#price').on('keydown', function(event) {
                let eWhich = event.which;
                let key = String.fromCharCode(event.which); // Cannot access 'key' before initialization
                if(key >= 0 && key <= 9 || eWhich ===8 || eWhich===46 || eWhich === 37 || eWhich === 39  || eWhich === 188 || eWhich === 190 ) {
                  return true;
                }else{
                  event.preventDefault();
                }
              })

              $('#customs_check').change(function() {   
                console.log($(this).prop('checked'))
                if($(this).prop('checked')) {
                  $('#customs').val(1)
                }else{
                  $('#customs').val(0)
                }
              })
            });

            $('#show_message').mouseenter(function() {
              $('#message').css('display','block')
            }).mouseleave( function() {
              $('#message').css('display','none')
            });
          </script> 

        @elseif(Route::is('home.statement.edit'))
          <script defer src="https://gitcdn.github.io/bootstrap-toggle/2.2.2/js/bootstrap-toggle.min.js"></script>
          <script>
            console.log('home.statement.edit')
            $(function() {          
              $('#mileage').on('keydown', function(event){
                  let key = String.fromCharCode(event.which);
                  let eWhich = event.which;                              
                  if(key >= '0' && key <= 9 || eWhich ===8 || eWhich===46 || eWhich === 37 || eWhich === 39) {
                    return true;
                  }else{
                    event.preventDefault();
                  }
              });

              $('#customs_check').change(function() {   
                console.log($(this).prop('checked'))
                if($(this).prop('checked')) {
                  $('#customs').val(1)
                }else{
                  $('#customs').val(0)
                }
              })
            })
          </script>

        @else
          <script>
            console.log('home, something else')
          </script>     
        @endif

    </body>
  </html>