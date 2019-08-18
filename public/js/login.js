function loginUser(event) {
    event.preventDefault();
    // let logAction = "{!! route('login', app()->getLocale()) !!}"
    // let appUrl = "{!! config('app.url') !!}";

    let logForm = document.forms['login'];
    let logMail = logForm.elements['email'].value;
    let logPass = logForm.elements['password'].value;
    let logToken = logForm.elements['_token'].value;

    let logAction = logForm.action;
    let appUrl = logForm.elements['app_url'].value;

    let logData = {
      email: logMail,
      password: logPass,
      byFetch: true,
    }
    let headers = {
      'X-CSRF-TOKEN': logToken,
      // "Content-type": "application/json; charset=UTF-8"
    }


    if(logMail.trim() === '' || logPass.trim()=== '') {
      $('#loginErrorMsg').html('chi kara datark lini')
    }

    $.ajax({
      type:'post',
      url: logAction,
      // headers: headers,
      // data: JSON.stringify(logData),
      data: new FormData(logForm),
      // dataType: 'json',
      cache: false,
      processData: false,
      contentType: false,
      success: function(data){
        console.log('success')
        console.log(data);
        /* 
        1. get 'intended' add to appUrl
        2. save user and auth into window
        */
        let redirectTo  = appUrl +'/'+ data.intended;
        window.user = data.user;
        window.auth = data.auth;
        window.location.replace(redirectTo)

      },
      error: function(data) {
        console.log('error')
        console.log(data);
        $('#loginErrorMsg').css('display','block') 
      }
    })

  }

  $(function () {
    $('form[name="login"] #email').focus( function() {
      $('#loginErrorMsg').css('display','none') 
    })

    $('form[name="login"] #password').focus(function() {
      $('#loginErrorMsg').css('display','none') 
    })
  });