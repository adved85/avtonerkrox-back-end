{{-- @extends('layouts.app') --}}
@extends('../layouts.app_home')

@section('content')

<div class="container py-5 px-3 notify-wrapper">
    <div class="row justify-content-center">
        <div class="col-md-10">
            @if (session('status'))
                <div class="alert alert-success" role="alert">
                    {{ session('status') }}
                </div>
            @endif

            <div class="card">
                <div class="card-header">
                    {{__('Notifications')}} <span class="badge badge-pill badge-primary">10</span>
                </div>
                <div class="card-body">
                    <ul class="list-group">
                        <li class="list-group-item">
                            <div class="row">
                                <div class="col align-self-start my-auto bg-my-warning">
                                    <span class="notify-status">{{__('Pending approval')}}</span> 
                                </div>
                                <div class="col align-self-center">
                                    <span class="notily-item">Aston Martin DB7</span>
                                </div>
                                <div class="col align-self-end my-auto text-right">
                                    <div class="btn-group" role="group" aria-label="Basic example">
                                        <button type="button" class="btn  btn-danger">X</button>
                                        <button type="button" class="btn btn-primary">Edit</button>
                                    </div>
                                </div>
                            </div>                        
                        </li>

                        <li class="list-group-item">
                            <div class="row">
                                <div class="col align-self-start my-auto bg-my-danger">
                                        <span class="notify-status">{{__('Rejected')}}</span> 
                                </div>
                                <div class="col align-self-center">
                                    <span class="notily-item">Aston Martin DB7</span>
                                </div>
                                <div class="col align-self-end my-auto text-right">
                                    <div class="btn-group" role="group" aria-label="Basic example">
                                        <button type="button" class="btn  btn-danger">X</button>
                                        <button type="button" class="btn btn-primary">Edit</button>
                                    </div>
                                </div>
                            </div>                            
                        </li>
                        <li class="list-group-item">
                            <div class="row">
                                <div class="col align-self-start my-auto bg-my-success">
                                    <span class="notify-status">{{__('Approved')}}</span>
                                </div>
                                <div class="col align-self-center">
                                    <span class="notily-item">Aston Martin DB7</span>
                                </div>
                                <div class="col align-self-end text-right">
                                    <div class="btn-group" role="group" aria-label="Basic example">
                                        <button type="button" class="btn  btn-danger">X</button>
                                        <button type="button" class="btn btn-primary">Edit</button>
                                    </div>
                                </div>
                            </div>                            
                        </li>
                        <li class="list-group-item">{{__('There are no new notifications')}}</li>
                    </ul>
                </div>
            </div>

            
            
            
           
        </div>
    </div>
</div>

@endsection
