@extends('../layouts/dash')

@section('content')
<div class="container">
    @include('../common/success')
    @include('../common/error')

    <div class="card shadow">
        <div class="card-header bg-dark text-white">
            <a href="{{route('admin.index',app()->getLocale())}}">Dashboard</a> / 
            <a href="{{route('admin.statements',app()->getLocale())}}">Statements</a> /item/{{$id}}
        </div>
        <div class="card-body">

            <!-- User data-table -->
            <table class="table table-responsive-sm table-sm table-bordered py-2">                
                <thead class="bg-light">
                    <tr>
                        <th>#</th>
                        <th>Name</th>
                        <th>E-mail</th>
                        <th>Phone</th>                        
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>{{$statement->user_id}}</td>
                        <td>{{$statement->name}} {{$statement->last_name}}</td>
                        <td>{{$statement->email}}</td>
                        <td>{{$statement->phone}}</td>
                    </tr>
                </tbody>
            </table>
            
            <!-- Current statement -->
            <div class="container">
            <div class="row justify-content-start">
                <div class="col-md-6 border">
                    <div class="row">
                        <div class="main-thumb-wrap">
                            <img src="{{ asset($statement->thumb)}}" alt="" class="item-thumb">
                        </div>
                        
                                                    
                            @if (!empty($fileData))
                            <div class="all-thumbs-wrap" id="lightgallery">
                            @foreach ($fileData as $item)
                            <a href="{{ asset($item['url'])}}" class="each-thumb-wrap" title="{{ $item['name']}}">
                                    <div class="image_zoom">
                                        <i class="fa fa-search-plus"></i>
                                    </div>
                                <img src="{{ asset($item['url'])}}" alt="" class="item-thumb">
                            </a>
                            @endforeach
                            </div>                           
                            @endif
                        
                    </div>
                </div>
                <div class="col-md-6 border">
                    <table class="table item-table-description">                        
                        <tbody>
                            <tr>
                                <td class="align-middle">{{__('Make')}}/{{__('Model')}}</td>
                                <td class="align-middle">{{$statement->make_title}} {{$statement->car_title}}</td>                                
                            </tr>
                            <tr>
                                <td class="align-middle">{{__('Body')}}</td>
                                <td class="align-middle">{{__("b_types.$statement->b_type")}}</td>                                
                            </tr>
                            <tr>
                                <td class="align-middle">{{__('Doors')}}</td>
                                <td class="align-middle">{{$statement->doors}} {{__('_doors')}}</td>                                
                            </tr>
                            <tr>
                                <td class="align-middle">{{__('Year')}}</td>
                                <td class="align-middle">{{$statement->year}}</td>                                
                            </tr>
                            <tr>
                                <td class="align-middle">{{__('Mileage')}}</td>
                                <td class="align-middle">{{$statement->mileage}} {{__('km')}}</td>                                
                            </tr>
                            <tr>
                                <td class="align-middle">{{__('Engine')}}</td>
                                <td class="align-middle">{{ __("e_types.$statement->e_type")}}</td>                                
                            </tr>
                            <tr>
                                <td class="align-middle">{{__('Engine Volume')}}</td>
                                <td class="align-middle">{{ $statement->engine_value}} {{__('liter')}}</td>                                
                            </tr>
                            <tr>
                                <td class="align-middle">{{__('Pistons')}}</td>
                                <td class="align-middle">{{ $statement->pistons}}</td>                                
                            </tr>
                            <tr>
                                <td class="align-middle">{{__('Gearbox')}}</td>
                                <td class="align-middle">{{ __("g_type.$statement->g_type")}}</td>                                
                            </tr>
                            <tr>
                                <td class="align-middle">{{__('Drivetrain')}}</td>
                                <td class="align-middle">{{ __("d_type.$statement->d_type")}}</td>                                
                            </tr>
                            <tr>
                                <td class="align-middle">{{__('Color')}}</td>
                                <td class="align-middle">{{ __("colors.$statement->color")}}</td>                                
                            </tr>
                            <tr>
                                <td class="align-middle">{{__('Steering_wheel')}}</td>
                                <td class="align-middle">{{ __("sw_type.$statement->sw_type")}}</td>                                
                            </tr>
                            <tr>
                                <td class="align-middle">{{__('Price')}}</td>
                                <td class="align-middle">{{$statement->price}} {{$statement->crc_symbol}}</td>
                            </tr>
                            <tr>
                                <td class="align-middle">{{__('Customs')}}</td>
                                <td class="align-middle">
                                    @if ($statement->customs === 0)
                                        <span class="text-danger">{{__('No')}}</span>
                                    @else
                                    <span class="text-success">{{__('Yes')}}</span>
                                    @endif                                    
                                </td>
                            </tr>
                            <tr>
                                <td class="align-middle text-justify" colspan="2">{{$statement->description}}</td>                                                           
                            </tr>
                            
                        </tbody>
                    </table>
                </div>
            </div>            
            </div><!-- container -->
        </div><!-- card-body -->
        <div class="card-footer">
            <form class="form-inline" 
            action="{{route('admin.statements.update',['locale'=>app()->getLocale(),'id'=>$statement])}}"
            method="POST">
            @csrf
            @method('put')
                <div class="form-group mb-2 col-md-12 row" id="message-wrap">
                    <label for="message">Rejection Message</label>
                    <textarea name="message" id="message" rows="5" class="form-control w-100">{{$statement->message}}</textarea>
                </div>
                <div class="form-group mb-2">
                    <label for="statement_status" class="form-control">{{__('status')}}</label>
                    <input type="hidden" name="statement_id" value="{{$id}}">
                    {{-- <input type="hidden" name="message" value="" id="message"> --}}
                </div>
                <div class="form-group mx-sm-3 mb-2 w-50">                    
                    <select name="status" class="form-control w-100" id="statement_status">
                        <option value="-1"{{$statement->status ===-1?'selected':''}}>{{__('status_rejected')}}</option>  
                        <option value="0" {{$statement->status ===0?'selected':''}}>{{__('status_pending')}}</option>
                        <option value="1" {{$statement->status ===1?'selected':''}}>{{__('status_approved')}}</option>
                        <option value="2" {{$statement->status ===2?'selected':''}}>{{__('status_payed')}}</option>
                    </select>                    
                </div>                
                <button type="submit" class="btn btn-primary mb-2">Update Status</button>
                @if ($statement->message)
                    <p class="alert alert-danger">{{$statement->message}}</p>
                @endif                
            </form>
        </div>
    </div>
</div>
@endsection