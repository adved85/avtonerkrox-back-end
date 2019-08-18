<!-- statement-edit, get my N-id statements -->
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
<span class="back-statement-edit-img">
<div class="container py-4 px-3 statement-wrapper">
    <div class="card">
        <div class="card-header">
            @include('../common.errors')
            @include('../common.success')
            <a href="{{route('home', app()->getLocale())}}">{{__('My_statements')}}</a> /
            {{__('Statement')}} N-{{$st_id}}
        </div>
        <div class="card-body">
            <div class="col-md-10 mx-auto">
                @if(!empty($fileData))
                <div class="d-flex flex-column justify-content-center bg-grey mb-5 w-75 mx-auto bg-light">
                <h4>{{ __('Uploaded_Images_title')}}</h4>
                    @foreach ($fileData as $file)
                    <div class="p-2 d-flex flex-row border border-secondary justify-content-between align-items-center">
                        <img src="{{$file['url']}}" alt="" class="thumb-home img-thumbnail">
                        <p class="p-2 font-12">{{ $file['name']}}</p>
                    </div>                        
                    @endforeach
                </div>
                @else
                <p>{{__('Please_upload')}}</p>
                @endif

                {{-- <form action="{{route('home.statement.upload', app()->getLocale())}}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="form-group row">
                    <div class="col-sm-6">
                        <input type="file" name="up_images[]" id="up_images" class="form-control my-auto" multiple>
                    </div>
                    <div class="col-sm-6">
                        <input type="hidden" name="statement_id" value="{{$st_id}}">
                        <button type="submit" class="btn btn-primary px-4">{{__('Upload_text')}}</button>
                    </div>    
                </div>
                </form><hr class="bg-secondary">                         --}}
            </div>

            <div class="col-md-10 mx-auto">
                <form action="{{route('home.statement.update',app()->getLocale() )}}" method="post">
                    @csrf
                    @method('put')
                    <input type="hidden" name="id" value="{{$st_id}}">
                    <div class="form-group row">
                        <div class="col-sm-6">
                            <label for="make_id">{{ __('Make')}}</label>
                            <input type="text" name="make_id" id="make_id" class="form-control" value="{{$statement->make_title}}" readonly>
                        </div>
                        <div class="col-sm-6">
                            <label for="model_id">{{ __('Model')}}</label>
                            <input type="text" name="model_id" id="model_id" class="form-control" value="{{$statement->car_title}}" readonly>
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col-sm-6">
                            <label for="body_type_id">{{__('Body')}}</label>                                        
                            <select name="body_type_id" id="body_type_id" class="form-control">
                                {{-- <option value="0">{{__('Select_any')}}</option> --}}
                                @forelse ($body_types as $body)                                                
                                    <option value="{{$body->id}}" @if ($statement->body_type_id == $body->id) {{ 'selected' }} @endif>{{ __("b_types.$body->b_type")}}</option>
                                @empty
                                    <option value="0">{{__('Select_any')}}</option>
                                @endforelse
                            </select>
                        </div>
                        <div class="col-sm-6">
                        <label for="doors">{{__('Doors')}}</label>                                        
                            <select name="doors" id="doors" class="form-control">
                                @for ($i = 3; $i < 8; $i++)
                                    <option value="{{$i}}" @if ($statement->doors == $i) {{ 'selected' }} @endif>{{$i. __('_doors')}}</option>
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
                                    <option value="{{$j}}" @if ($statement->year == $j) {{ 'selected' }} @endif>{{$j}}</option>
                                @endfor
                            </select>
                        </div>
                        <div class="col-sm-3">
                            <label for="mileage">{{ __('Mileage')}} ({{ __('km')}})</label>
                            <input type="text" class="form-control" id="mileage" name="mileage" pattern="\d*" maxlength="7" value="{{$statement->mileage}}">                                        
                        </div>
                        
                        <div class="col-sm-3">
                            <label for="engine_type_id">{{ __('Engine')}}</label>

                            <select name="engine_type_id" id="engine_type_id" class="form-control">                                
                                @forelse ($engine_types as $engine)
                                    <option value="{{$engine->id}}" @if ($statement->engine_type_id==$engine->id) {{ 'selected' }} @endif>{{ __("e_types.$engine->e_type") }}</option>
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
                                <option value="{{sprintf('%0.1f', $i)}}" @if ($statement->engine_value ==sprintf('%0.1f', $i)) {{ 'selected' }} @endif>{{ sprintf('%0.1f', $i) }} L</option>
                                @else
                                <option value="{{sprintf('%0.1f',$i - 0.1)}}+"  @if ($statement->engine_value ==sprintf('%0.1f',$i - 0.1).'+') {{ 'selected' }} @endif>{{ sprintf('%0.1f',$i - 0.1)}}+{{__('liter')}}</option>
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
                                    <option value="{{$i}}" @if ($statement->pistons ==$i) {{ 'selected' }} @endif>{{$i}}</option>                                                
                                @endfor 
                            </select>
                        </div>
                        <div class="col-sm-6">
                            <label for="gearbox_id">{{__('Gearbox')}}</label>
                            <select name="gearbox_id" id="gearbox_id" class="form-control">                                
                                @forelse ($gearboxes as $gearbox)
                                    <option value="{{$gearbox->id}}" @if ($statement->gearbox_id ==$gearbox->id) {{ 'selected' }} @endif>{{__("g_type.$gearbox->g_type")}}</option>
                                @empty
                                    <option value="0">{{__('Select_any')}}</option>
                                @endforelse
                            </select>
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col-sm-6">
                        <label for="drivetrain_id">{{__('Drivetrain')}}</label>                            
                            <select name="drivetrain_id" id="drivetrain_id" class="form-control">
                                @forelse ($drivetrains as $drivetrain)
                                    <option value="{{$drivetrain->id}}" @if ($statement->drivetrain_id ==$drivetrain->id) {{ 'selected' }} @endif>{{__("d_type.$drivetrain->d_type")}}</option>
                                @empty
                                    <option value="0">{{__('Select_any')}}</option>
                                @endforelse                                               
                            </select>
                        </div>
                        <div class="col-sm-6">
                        <label for="steering_wheel_id">{{__('Steering_wheel')}}</label>
                            <select name="steering_wheel_id" id="steering_wheel_id" class="form-control">
                                @forelse ($steeringWheels as $steeringWheel)
                                    <option value="{{$steeringWheel->id}}" @if ($statement->steering_wheel_id ==$steeringWheel->id) {{ 'selected' }} @endif>{{__("sw_type.$steeringWheel->sw_type")}}</option>
                                @empty
                                    <option value="0">{{__('Select_any')}}</option>
                                @endforelse
                            </select>
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col-sm-3">
                        <label for="color_id">{{__('Color')}}</label>
                            <select name="color_id" id="color_id" class="form-control">
                            @forelse ($colors as $color)
                                <option value="{{$color->id}}" @if ($statement->color_id ==$color->id) {{ 'selected' }} @endif>{{__("colors.$color->color_name")}}</option>
                            @empty
                                <option value="0">{{__('Select_any')}}</option>
                            @endforelse
                            </select>
                        </div>
                        <div class="col-sm-3">
                            <label for="price">{{__('Price')}}</label>
                        <input type="text" class="form-control" id="price" name="price" value="{{$statement->price}}">                                        
                        </div>

                        <div class="col-sm-3">
                            <label for="currency_id">{{__('Currency')}}</label>
                            <select name="currency_id" id="currency_id" class="form-control">                                            
                            @forelse ($currencies as $currency)
                                <option value="{{$currency->id}}" @if ($statement->currency_id ==$currency->id) {{ 'selected' }} @endif>{{ $currency->crc_code}}</option>
                            @empty
                                <option value="0">{{__('Select_any')}}</option>
                            @endforelse
                            </select>
                        </div>
                        <div class="col-sm-3">
                            <label for="customs_check">{{__('Customs')}}</label><br>
                            @if($statement->customs)
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
                            <select name="thumb" id="thumb" class="form-control">                                            
                                @forelse ($fileData as $file)
                                    <option value="{{$file['url']}}" @if ($statement->thumb ==$file['url']) {{ 'selected' }} @endif>{{$file['name']}}</option>
                                @empty
                                    <option value="0">{{__('Select_any')}}</option>
                                @endforelse
                            </select>
                        </div>

                        <div class="col-sm-9">
                            <label for="description">{{__('Description')}}</label>
                            <textarea class="form-control" rows="5" id="description" name="description">{{$statement->description}}</textarea>
                        </div>
                    </div>

                    <button type="submit" class="btn btn-primary px-4 float-right">{{__('Update')}}</button>
                </form>
            </div>
        </div><!-- card-body -->
    </div>
</div>
</span>
@endsection