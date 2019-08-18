<!-- statement-index, get all my statements -->
@extends('../layouts.app_home')

@section('content')
<div class="container py-4 px-3 settings-edit-wrapper" style="background-color:transparent">
        <div class="card col-md-10 mx-auto shadow-lg" id="edit-settings-card">
        @include('../common.errors')
        @include('../common.success')
        @include('../common.error')
                <div class="card-header bg-secondary text-light border-bottom">
                        {{__('My_settings')}}
                </div>
                <div class="card-body">
                        <div class="container px-5">
                                <div class="card mb-4" id="card-email-change">
                                        <div class="card-header bg-primary text-light mx-4">
                                                {{ __("Change_email")}}
                                        </div>
                                        <div class="card-body">
                                                <form action="{{route('home.settings.updateEmail',['locale'=>app()->getLocale()])}}" method="POST">
                                                        @csrf
                                                        @method('put')
                                                        <div class="form-group row">
                                                        <label for="email" class="col-md-5 col-form-label">{{__('New_email')}}</label>
                                                        <div class="col-md-6">
                                                                <input type="email" name="email" class="form-control" id="email" placeholder="{{__('E-Mail Address')}}">
                                                        </div>
                                                        </div>

                                                        <div class="form-group row">
                                                        <label for="password" class="col-md-5 col-form-label">{{__('Password')}}</label>
                                                        <div class="col-md-6">
                                                                <input type="text" name="password" class="form-control" id="password" placeholder="{{__('Password')}}">
                                                        </div>
                                                        </div>

                                                        <div class="form-group row">
                                                        <label for="password_confirmation" class="col-md-5 col-form-label">{{__('Confirm Password')}}</label>
                                                        <div class="col-md-6">
                                                                <input type="text" name="password_confirmation" class="form-control" id="password_confirmation" placeholder="{{__('Confirm Password')}}">
                                                        </div>
                                                        </div>
                                                        <button type="submit" class="btn btn-primary">{{__('Save')}}</button>
                                                </form>
                                        </div>
                                </div>

                                <div class="card" id="card-pass-change">
                                        <div class="card-header bg-primary text-light mx-4">
                                                {{ __("Change_password")}}
                                        </div>

                                        <div class="card-body">                                                
                                                <form action="{{route('home.settings.updatePass', app()->getLocale())}}" method="POST">
                                                        @csrf
                                                        @method('put')                                                       

                                                        <div class="form-group row">
                                                        <label for="old_password" class="col-md-5 col-form-label">{{__('Old_password')}}</label>
                                                        <div class="col-md-6">
                                                                <input type="text" name="old_password" class="form-control" id="old_password" value="{{old('old_password')}}" placeholder="{{__('Old_password')}}">
                                                        </div>
                                                        </div>

                                                        <div class="form-group row">
                                                        <label for="new_password" class="col-md-5 col-form-label">{{__('New_password')}}</label>
                                                        <div class="col-md-6">
                                                                <input type="text" name="new_password" class="form-control" id="new_password" value="{{old('new_password')}}" placeholder="{{__('New_password')}}">
                                                        </div>
                                                        </div>

                                                        <div class="form-group row">
                                                        <label for="new_password_confirmation" class="col-md-5 col-form-label">{{__('Confirm Password')}}</label>
                                                        <div class="col-md-6">
                                                                <input type="text" name="new_password_confirmation" class="form-control" id="new_password_confirmation" value="{{old('new_password_confirmation')}}" placeholder="{{__('Confirm Password')}}">
                                                        </div>
                                                        </div>
                                                        <button type="submit" class="btn btn-primary">{{__('Save')}}</button>

                                                </form>
                                        </div>
                                </div>
                        </div>

                </div>
        </div>
</div>
@endsection