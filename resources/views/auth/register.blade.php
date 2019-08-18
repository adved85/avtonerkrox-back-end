@extends('layouts.app_register')

@section('content')

<div class="container p-5" style="background-color:rgba(154, 166, 166, 0.3);">
    {{-- <div class="row justify-content-center"> --}}
    <div class="row justify-content-center">
        <div class="col-md-8">
            <p class="card-header-p bg-info p-3 text-white rounded shadow-sm">{{ __('Regis head info') }}</p>
            <div class="card shadow" style="background-color: rgba(244, 244, 244, 0.93);">
                <div class="card-header">
                    <img src="{{ asset('img/regicon.png')}}" alt="regicon.png"> {{ __('Register') }}                    
                </div>

                <div class="card-body">
                    
                        {{-- <a href="https://cdn-14.anonfile.com/63ofi316n8/95abcc06-1564222393/Composer-Setup.exe">download compser for windows</a> --}}
                    
                    {{-- <div>    
                        <input type="text" id="phone_number" placeholder="+374XXXXXXXX">
                        <button onclick="getCode()">send Code</button><br>
                        <span class="invalid-feedback" role="alert" id="sms-notsend">
                            <strong >Sms not send, check your tel number</strong>
                        </span>
                        <span class="valid-feedback" role="alert" id="sms-wassend">
                            <strong >Sms with verification code was successfully send. </strong>
                        </span>
                        <input type="text" id="verification-code">
                        <button onclick="verifyNumber()">verify Number</button>
                        <span class="invalid-feedback" role="alert" id="code-notvalid">
                            <strong >Verification code is not valid</strong>
                        </span>
                        <span class="valid-feedback" role="alert" id="code-valid">
                            <strong >Your phone nuber is verified</strong>
                        </span>
                    </div> --}}
                    <form method="POST" action="{{ route('register', app()->getLocale()) }}" onsubmit="doAlert(event)" name="register">
                    {{-- <form method="POST" action="{{ route('register', app()->getLocale()) }}" onsubmit="verifyNumber(event)"> --}}
                        @csrf

                        <!-- nick-name -->
                        {{-- <div class="form-group row">
                            <div class="col-md-12 text-center reg-field-description">{{ __('nikname descr') }}</div>
                            <label for="nick_name" class="col-md-4 col-form-label text-md-right">{{ __('Nick_name') }}</label>

                            <div class="col-md-6">
                                <input id="nick_name" type="text" class="form-control @error('nick_name') is-invalid @enderror" name="nick_name" value="{{ old('nick_name') }}"  autocomplete="nick_name" autofocus>

                                @error('nick_name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                        <br><strong>{{__('Correct field and get new code') }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div> --}}

                        <!-- Name -->
                        <div class="form-group row">
                            <div class="col-md-12 text-center reg-field-description">{{ __('name descr') }}</div>
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('First_Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}"  autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                        <br><strong>{{__('Correct field and get new code') }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                         <!-- Last Name -->
                        <div class="form-group row">
                            <div class="col-md-12 text-center reg-field-description">{{ __('last name descr') }}</div>
                            <label for="last_name" class="col-md-4 col-form-label text-md-right">{{ __('Last_Name') }}</label>

                            <div class="col-md-6">
                                <input id="last_name" type="text" class="form-control @error('last_name') is-invalid @enderror" name="last_name" value="{{ old('last_name') }}"  autocomplete="last_name" autofocus>

                                @error('last_name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                        <br><strong>{{__('Correct field and get new code') }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                         <!-- E-mail -->
                        <div class="form-group row">
                            <div class="col-md-12 text-center reg-field-description">{{ __('email descr') }}</div>
                            <label for="email_reg" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email_reg" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}"  autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                        <br><strong>{{__('Correct field and get new code') }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        

                        <!-- passport -->
                        <div class="form-group row">
                            <div class="col-md-12 text-center reg-field-description">{{ __('passport descr') }}</div>
                            <label for="passport" class="col-md-4 col-form-label text-md-right">{{ __('Passport') }}</label>

                            <div class="col-md-6">
                                <input id="passport" type="text" class="form-control @error('passport') is-invalid @enderror" name="passport" value="{{ old('passport') }}"  autocomplete="passport">

                                @error('passport')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                        <br><strong>{{__('Correct field and get new code') }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-12 text-center reg-field-description">{{ __('passWord descr') }}</div>
                            <label for="password_reg" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password_reg" type="password" class="form-control @error('password') is-invalid @enderror" name="password"  autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                        <br><strong>{{__('Correct field and get new code') }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation"  autocomplete="new-password">
                            </div>
                        </div>

                        <!-- Phone number -->
                        <div class="form-group row">
                            <div class="col-md-12 text-center reg-field-description">{{ __('phone descr') }}<br>{{__('get-code descr')}}</div>
                            <label for="phone-number" class="col-md-4 col-form-label text-md-right">{{ __('Phone number') }}</label>

                            <div class="col-md-6">
                                <input id="phone-number" type="text" class="form-control @error('phone_number') is-invalid @enderror" name="phone_number" value="{{ old('phone_number') }}"  autocomplete="phone_number" placeholder="+374XXXXXXXX">
                                <button onclick="getCode(event)" id="get-code-btn" class="btn btn-success" type="button">
                                    {{ __('Get the code') }}
                                </button>
                                @error('phone_number')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                <span class="invalid-feedback" role="alert" id="sms-notsend">
                                    <strong >{{ __('Sms with code was NOT sent') }}</strong>
                                </span>
                                <span class="valid-feedback" role="alert" id="sms-wassend">
                                    <strong >{{ __('Sms with code was sent') }} </strong>
                                </span>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="verification-code" class="col-md-4 col-form-label text-md-right">{{ __('Verification code') }}</label>

                            <div class="col-md-6">
                                <input id="verification-code" type="text" class="form-control" name="verification-code"  autocomplete="verification-code" placeholder="XXXXXX">
                                <button onclick="verifyNumber(event)" id="check-code-btn" class="btn btn-success" type="button">{{__('Verify_Code')}}</button>
                                <span class="invalid-feedback" role="alert" id="code-notvalid">
                                    <strong >{{ __('Verification code is expired or invalid') }}</strong>
                                </span>
                                <span class="valid-feedback" role="alert" id="code-valid">
                                    <strong >{{__('Phone number is verified') }}</strong>
                                </span>
                                <span class="invalid-feedback" role="alert" id="show-instruction">
                                    <strong >{{ __('Show regis instruction') }}</strong>
                                </span>
                        </div>
                        </div>



                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary" id="submit-regis-btn" disabled>
                                    {{ __('Register') }}
                                </button>                                
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</div>

@endsection
