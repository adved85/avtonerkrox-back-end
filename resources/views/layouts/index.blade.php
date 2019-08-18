  <!-- resources/views/layouts/index.blade.php -->

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
      <link rel="stylesheet" href="{{ asset('css/slick-theme.css') }}">
      <link rel="stylesheet" href="{{ asset('css/slick.css') }}">
      <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
      <link rel="stylesheet" href="{{ asset('css/common.css') }}">


      <link rel="dns-prefetch" href="//fonts.gstatic.com">
      <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
      <link href="https://fonts.googleapis.com/css?family=Ubuntu:500,700&display=swap" rel="stylesheet">
      <style>
       body, html {
            font-family: 'Ubuntu', sans-serif;
        }
      </style>
      
    </head>
  
    <body>
      {{-- <div class="container"></div> --}}
      @include('../includes/navmodals')
      
  
      @yield('content')
      @include('../includes/footer')
     
      <script src="{{ asset('js/all.js') }}"></script>
      <script src="{{ asset('js/login.js') }}"></script>

      <script>
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
                    options.unshift(`<option value="0">${select_model}</option`);
                    $('#model_id').html(options)
                    $('#model_id').removeAttr('disabled')                    
                  }
                  
                }else{                  
                  $('#model_id').html(`<option value="0">${select_model}</option`)
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
                    options.unshift(`<option value="0">${select_model}</option`);
                    $('#model_id').html(options)
                    $('#model_id').removeAttr('disabled')                    
                  }
                  
                }else{                  
                  $('#model_id').html(`<option value="0">${select_model}</option`)
                  $('#model_id').attr('disabled',true)
                }
              }
            });

            $('#price_start').on('keydown', function(event) {
                let eWhich = event.which;
                let key = String.fromCharCode(event.which); // Cannot access 'key' before initialization
                if(key >= 0 && key <= 9 || eWhich ===8 || eWhich===46 || eWhich === 37 || eWhich === 39  || eWhich === 188 || eWhich === 190 ) {
                  return true;
                }else{
                  event.preventDefault();
                }
            })

            $('#price_end').on('keydown', function(event) {
                let eWhich = event.which;
                let key = String.fromCharCode(event.which); // Cannot access 'key' before initialization
                if(key >= 0 && key <= 9 || eWhich ===8 || eWhich===46 || eWhich === 37 || eWhich === 39  || eWhich === 188 || eWhich === 190 ) {
                  return true;
                }else{
                  event.preventDefault();
                }
            })
          
        })
      </script>

    </body>
  </html>