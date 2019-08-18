
<!-- statement-index, get all my statements -->
@extends('../layouts.app_home')

<script>
    let models = Array();
    let carmodels = {!! $carmodels !!}
    let select_any = "{{ __('Select_any')}}"
    // console.log(carmodels);
    // console.log(models);
    // console.log(select_any);    
</script>

@section('content')
<span class="back-statement-img">
<div class="container py-4 px-3 statement-wrapper">        
        <div class="card">
            <div class="card-header">
                @include('../common.errors')
                @include('../common.success')
                <button type="button" class="btn btn-primary no-shadow" data-toggle="collapse" data-target="#wrap-add-statement-form">
                    {{ __('Add new Statement')}}
                </button>                
            </div>
            
            <div id="wrap-add-statement-form" class="collapse">           
            <div class="card-body">
                <div class="container py-3">
                    <div class="row">

                        <div class="col-md-10 mx-auto">
                            @if(!empty($fileData))
                            <div class="d-flex flex-column justify-content-center bg-grey mb-5">
                            <h4>{{ __('Uploaded_Images_title')}}</h4>
                                @forelse ($fileData as $file)
                                <div class="p-2 d-flex flex-row border border-secondary justify-content-between">
                                    <img src="{{$file['url']}}" alt="" class="thumb-home img-thumbnail">
                                    <p class="p-2">{{ $file['name']}}</p>
                                </div>
                                @empty
                                    <p>{{__('Please_upload')}}</p>
                                @endforelse
                            </div>
                            @else
                            <p>{{__('Please_upload')}}</p>
                            @endif

                            <form action="{{route('home.statement.upload', app()->getLocale())}}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group row">
                                <div class="col-sm-6">
                                    <input type="file" name="up_images[]" id="up_images" class="form-control my-auto" multiple>
                                </div>
                                <div class="col-sm-6">
                                    <input type="hidden" name="statement_id" value="{{$last_id}}">
                                    {{-- <input type="hidden" name="user_id" value="{{Auth::user()->id}}"> --}}
                                    <button type="submit" class="btn btn-primary px-4">{{__('Upload_text')}}</button>
                                </div>    
                            </div>
                            </form><hr class="bg-secondary">                        
                        </div>


                        <div class="col-md-10 mx-auto">                            
                            <form action="{{route('home.statement.store', app()->getLocale())}}" method="POST">
                                @csrf
                                <input type="hidden" name="user_id" value="{{Auth::user()->id}}">
                                {{-- <input type="hidden" name="statement_id" value="{{$last_id}}"> --}}
                                <div class="form-group row">
                                    <div class="col-sm-6">
                                        <label for="make_id">{{ __('Make')}}</label>
                                        {{-- <input type="text" class="form-control" id="make_id" placeholder=""> --}}
                                        <select class="form-control" name="make_id" id="make_id">
                                            <option value="0">{{__('Select_any')}}</option>
                                            @forelse ($makes as $make)
                                                <option value="{{$make->id}}" @if (old('make_id') == $make->id) {{ 'selected' }} @endif>{{$make->title}}</option>
                                            @empty
                                                <option value="0">{{__('Select_any')}}</option>
                                            @endforelse                                            
                                        </select>
                                    </div>
                                    <div class="col-sm-6">
                                        <label for="model_id">{{ __('Model')}}</label>                                                                             
                                        <select class="form-control" name="model_id" id="model_id" disabled>
                                            <option value="0">{{__('Select_any')}}</option>                                            
                                        </select>
                                    </div>
                                </div>
                                
                                <div class="form-group row">
                                    <div class="col-sm-6">
                                        <label for="body_type_id">{{__('Body')}}</label>                                        
                                        <select name="body_type_id" id="body_type_id" class="form-control">
                                            <option value="0">{{__('Select_any')}}</option>
                                            @forelse ($body_types as $body)                                                
                                                <option value="{{$body->id}}" @if (old('body_type_id') == $body->id) {{ 'selected' }} @endif>{{ __("b_types.$body->b_type")}}</option>
                                            @empty
                                                <option value="0">{{__('Select_any')}}</option>
                                            @endforelse
                                        </select>
                                    </div>
                                    <div class="col-sm-6">
                                    <label for="doors">{{__('Doors')}}</label>                                        
                                        <select name="doors" id="doors" class="form-control">
                                            <option value="0">{{__('Select_any')}}</option>
                                            @for ($i = 3; $i < 8; $i++)
                                                <option value="{{$i}}" @if (old('doors') == $i) {{ 'selected' }} @endif>{{$i. __('_doors')}}</option>
                                            @endfor
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <div class="col-sm-3">
                                        <label for="year">{{ __('Year')}}</label>

                                        <select name="year" id="year" class="form-control">
                                            <option value="0">{{__('Select_any')}}</option>
                                            @for ($j = date('Y'); $j > 1930; $j--)
                                                <option value="{{$j}}" @if (old('year') == $j) {{ 'selected' }} @endif>{{$j}}</option>
                                            @endfor
                                        </select>
                                    </div>
                                    <div class="col-sm-3">
                                        <label for="mileage">{{ __('Mileage')}} ({{ __('km')}})</label>
                                        <input type="text" class="form-control" id="mileage" name="mileage" pattern="\d*" maxlength="7" value="{{old('mileage')}}">                                        
                                    </div>
                                    
                                    <div class="col-sm-3">
                                        <label for="engine_type_id">{{ __('Engine')}}</label>

                                        <select name="engine_type_id" id="engine_type_id" class="form-control">
                                            <option value="0">{{__('Select_any')}}</option>
                                            @forelse ($engine_types as $engine)
                                                <option value="{{$engine->id}}" @if (old('engine_type_id') ==$engine->id) {{ 'selected' }} @endif>{{ __("e_types.$engine->e_type") }}</option>
                                            @empty
                                                <option value="0">{{__('Select_any')}}</option>
                                            @endforelse
                                        </select>
                                    </div>
                                    <div class="col-sm-3">
                                        <label for="engine_value">{{__('Engine Volume')}}</label>
                                        <select name="engine_value" id="engine_value" class="form-control">
                                            @for ($i = 0.6; $i < 6.1; $i=$i + 0.1)
                                            
                                            @if($i <= 6.0)
                                            <option value="{{sprintf('%0.1f', $i)}}" @if (old('engine_value') ==sprintf('%0.1f', $i)) {{ 'selected' }} @endif>{{ sprintf('%0.1f', $i) }} L</option>
                                            @else
                                            <option value="{{sprintf('%0.1f',$i - 0.1)}}+"  @if (old('engine_value') ==sprintf('%0.1f',$i - 0.1).'+') {{ 'selected' }} @endif>{{ sprintf('%0.1f',$i - 0.1)}}+{{__('liter')}}</option>
                                            @endif
                                            @endfor

                                        </select>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <div class="col-sm-6">
                                    <label for="pistons">{{__('Pistons')}}</label>
                                        {{-- <input type="number" class="form-control" id="inputContactNumber" placeholder="Contact Number"> --}}
                                        <select name="pistons" id="pistons" class="form-control">
                                            @for ($i = 3; $i < 13; $i++)
                                                <?php if($i === 7 || $i ===9 || $i===11): continue; endif; ?>
                                                <option value="{{$i}}" @if (old('pistons') ==$i) {{ 'selected' }} @endif>{{$i}}</option>                                                
                                            @endfor 
                                        </select>
                                    </div>
                                    <div class="col-sm-6">
                                        <label for="gearbox_id">{{__('Gearbox')}}</label>
                                        {{-- <input type="text" class="form-control" id="inputWebsite" placeholder="Website"> --}}
                                        <select name="gearbox_id" id="gearbox_id" class="form-control">
                                                <option value="0">{{__('Select_any')}}</option>
                                            @forelse ($gearboxes as $gearbox)
                                                <option value="{{$gearbox->id}}" @if (old('gearbox_id') ==$gearbox->id) {{ 'selected' }} @endif>{{__("g_type.$gearbox->g_type")}}</option>
                                            @empty
                                                <option value="0">{{__('Select_any')}}</option>
                                            @endforelse
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <div class="col-sm-6">
                                    <label for="drivetrain_id">{{__('Drivetrain')}}</label>
                                        {{-- <input type="number" class="form-control" id="inputContactNumber" placeholder="Contact Number"> --}}
                                        <select name="drivetrain_id" id="drivetrain_id" class="form-control">
                                                <option value="0">{{__('Select_any')}}</option>
                                            @forelse ($drivetrains as $drivetrain)
                                                <option value="{{$drivetrain->id}}" @if (old('drivetrain_id') ==$drivetrain->id) {{ 'selected' }} @endif>{{__("d_type.$drivetrain->d_type")}}</option>
                                            @empty
                                                <option value="0">{{__('Select_any')}}</option>
                                            @endforelse                                               
                                        </select>
                                    </div>
                                    <div class="col-sm-6">
                                    <label for="steering_wheel_id">{{__('Steering_wheel')}}</label>
                                        {{-- <input type="text" class="form-control" id="inputWebsite" placeholder="Website"> --}}
                                        <select name="steering_wheel_id" id="steering_wheel_id" class="form-control">
                                                <option value="0">{{__('Select_any')}}</option>
                                            @forelse ($steeringWheels as $steeringWheel)
                                                <option value="{{$steeringWheel->id}}" @if (old('steering_wheel_id') ==$steeringWheel->id) {{ 'selected' }} @endif>{{__("sw_type.$steeringWheel->sw_type")}}</option>
                                            @empty
                                                <option value="0">{{__('Select_any')}}</option>
                                            @endforelse
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <div class="col-sm-3">
                                    <label for="color_id">{{__('Color')}}</label>
                                        {{-- <input type="number" class="form-control" id="inputContactNumber" placeholder="Contact Number"> --}}
                                        <select name="color_id" id="color_id" class="form-control">
                                                <option value="0">{{__('Select_any')}}</option>
                                            @forelse ($colors as $color)
                                                <option value="{{$color->id}}" @if (old('color_id') ==$color->id) {{ 'selected' }} @endif>{{__("colors.$color->color_name")}}</option>
                                            @empty
                                                <option value="0">{{__('Select_any')}}</option>
                                            @endforelse
                                        </select>
                                    </div>
                                    <div class="col-sm-3">
                                        <label for="price">{{__('Price')}}</label>
                                    <input type="text" class="form-control" id="price" name="price" value="{{old('price')}}">                                        
                                    </div>

                                    <div class="col-sm-3">
                                        <label for="currency_id">{{__('Currency')}}</label>
                                        {{-- <input type="number" class="form-control" id="inputContactNumber" placeholder="Contact Number"> --}}
                                        <select name="currency_id" id="currency_id" class="form-control">                                            
                                            @forelse ($currencies as $currency)
                                                <option value="{{$currency->id}}" @if (old('currency_id') ==$currency->id) {{ 'selected' }} @endif>{{ $currency->crc_code}}</option>
                                            @empty
                                                <option value="0">{{__('Select_any')}}</option>
                                            @endforelse

                                        </select>
                                    </div>
                                    <div class="col-sm-3">
                                        <label for="customs_check">{{__('Customs')}}</label><br>
                                        @if(old('customs'))
                                        <input type="checkbox" id="customs_check" name="customs_check" data-toggle="toggle" data-on="{{__('Yes')}}" data-off="{{__('No')}}" checked>
                                        <input type="hidden" name="customs" id="customs" value="1">
                                        @else
                                        <input type="checkbox" id="customs_check" name="customs_check" data-toggle="toggle" data-on="{{__('Yes')}}" data-off="{{__('No')}}">
                                        <input type="hidden" name="customs" id="customs" value="0">
                                        @endif

                                    </div> 
                                </div>

                                <div class="form-group row">
                                    <div class="col-sm-3">
                                        <label for="thumb">{{__('Thumb')}}</label>
                                        {{-- <input type="number" class="form-control" id="inputContactNumber" placeholder="Contact Number"> --}}
                                        <select name="thumb" id="thumb" class="form-control">                                            
                                            @forelse ($fileData as $file)
                                                <option value="{{$file['url']}}" @if (old('thumb') ==$file['url']) {{ 'selected' }} @endif>{{$file['name']}}</option>
                                            @empty
                                                <option value="0">{{__('Select_any')}}</option>
                                            @endforelse
                                        </select>
                                    </div>

                                    <div class="col-sm-9">
                                        <label for="description">{{__('Description')}}</label>
                                        <textarea class="form-control" rows="5" id="description" name="description">{{old('description')}}</textarea>
                                    </div>
                                </div>


                                <button type="submit" class="btn btn-primary px-4 float-right">{{__('Save')}}</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            </div>
        </div>

        <div class="card mt-3">
        <div class="card-header">{{__('My_statements')}}</div>
            <div class="card-body">
                @if(count($statements) > 0)
                    <table class="table table-hover table-sm table-bordered">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">image</th>
                                <th scope="col">Car</th>
                                <th scope="col">Status</th>
                                <th scope="col"></th>
                                <th scope="col">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($statements as $item)
                            <tr>
                                <th scope="row">{{$item->id}}</th>
                                <td><img src="{{$item->thumb}}" alt="" class="thumb-home img-thumbnail"></td>
                                <td>{{$item->make_title}} {{$item->car_title}}</td>
                                
                                <td>
                                    @if ($item->status === 1)
                                    <span class="text-primary">{{__('status_approved')}}</span>
                                    @elseif ($item->status === -1)
                                    <span class="text-danger" id="show_message">{{__('status_rejected')}}</span>
                                    <div id="message">{{$item->message}}</div>                                    
                                    @elseif ($item->status === 2)
                                    <span class="text-success">{{__('status_payed')}}</span>
                                    @else
                                       <span class="text-secondary">{{__('status_pending')}}</span>
                                    @endif
                                </td>
                                <td>
                                    
                                    @if ($item->status === 1)
                                    <button type="button" class="btn btn-primary">{{__('Pay')}}</button>
                                    @elseif ($item->status === -1)
                                    <span class="text-danger"><i class="material-icons font-38">timer_off</i></span>                                    
                                    @elseif ($item->status === 2)
                                    <span class="text-success"><i class="material-icons font-38">beenhere</i></span>
                                    @else
                                       <span class="text-secondary"><i class="material-icons font-38">timer</i></span>
                                    @endif
                                </td>
                                <td>
                                    <div class="btn-group" role="group" aria-label="Basic example">
                                        <form action="{{route('home.statement.destroy',['locale'=>app()->getLocale(),'st_id'=>$item->id])}}" method="post"
                                            onsubmit="return confirm('{{__("Really_want_delete")}}')? true : false">
                                            @csrf
                                            @method('delete')
                                            <button type="submit" class="btn btn-danger"><i class="material-icons">delete_sweep</i></button>
                                            <a href="{{route('home.statement.edit',['locale'=>app()->getLocale(),'st_id'=>$item->id])}}" target="_blank" type="button" class="btn btn-primary edit-btn">
                                                <i class="material-icons">create</i>
                                            </a>
                                        </form>
                                                                                
                                    </div>
                                </td>
                            </tr> 
                            @empty
                                
                            @endforelse
                                                         
                        </tbody>
                    </table>
                @else
                {{__('No_statement_yet')}}
                @endif
            </div>
        </div>
</div>
</span>
@endsection