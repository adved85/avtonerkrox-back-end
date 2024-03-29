{{-- @extends('layouts.app') --}}
@extends('layouts.app_pass_email')

@section('content')
<span class="back-pass-email-img">
<div class="container py-5 p-5" style="background-color:#839a9a6e; min-height: 90vh;">
    <div class="row justify-content-center">
        <div class="col-md-8">
                <p class="bg-info p-3 text-white rounded shadow-sm">
                    {{__('passwords.recovery_info')}}
                </p>
            <div class="card shadow">                
                <div class="card-header">{{ __('Reset Password') }}
                    
                </div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form method="POST" action="{{ route('password.email', app()->getLocale()) }}">
                        @csrf

                        <div class="form-group row">
                            <label for="email_pass_email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email_pass_email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                        {{-- <strong>{{ __('No user with this email') }}</strong> --}}
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                @if (session('status'))
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Resend Password Reset Link') }}
                                    </button>
                                @else
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Send Password Reset Link') }}
                                    </button>
                                @endif
                                
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</span>
@endsection
