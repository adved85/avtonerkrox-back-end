@extends('layouts.item')

@section('content')

@include('includes/slider')
<div class="btn-up"><i class="fa fa-chevron-up"></i></div>
<main>

<section class="item_section container">
<div class="item_properties">
        <div class="item_properties_gallery">
            <div class="item_coverImg">
                <img src='{{ asset($statement->thumb)}}' alt="bmw">
            </div>
            <div id="lightgallery">
                @forelse ($fileData as $file)
                    <a href="{{asset($file['url'])}}">
                        <div class="image_zoom">
                            <i class="fa fa-search-plus"></i>
                        </div>
                        <img src="{{ asset($file['url'])}}" alt="bmw">
                    </a>
                @empty
                    <p>No images for show</p>
                @endforelse
                {{-- <a href="img/bmw.jpg">
                    <div class="image_zoom">
                        <i class="fa fa-search-plus"></i>
                    </div>
                    <img src="img/bmw.jpg" alt="bmw">
                </a> --}}
            </div>
        </div>
        <div class="item_properties_settings">
            <div class="car_title_section">
                <div class="car_name_and_price">
                    <h2 class="item_current_title">{{$statement->make_title}} {{$statement->car_title}}</h2>
                    <h3 class="car_price">{{$statement->price}}
                        <span class="currency" data-currency="$">{{$statement->crc_symbol}}</span>
                    </h3>
                    <p class="count">
                        <img src="{{ asset('img/eye.png')}}" alt="eye">
                        Դիտվել է 
                    <span class="current_count">{{$statement->view}}</span> 
                        անգամ
                    </p>
                </div>
                <p class="publication_data"> Տեղադրված է՝ 
                    <span class="current_date">{{ date_format($statement->updated_at,'d-m-Y')}}</span>
                </p>
            </div>
            <div class="car_body_section">
                <div class="car_body_line">
                    <h4> <img src="{{ asset('img/icon1.png')}}" alt="settings">{{__('Body')}}</h4>
                    <p>{{ __("b_types.$statement->b_type")}}</p>
                </div>
                <div class="car_body_line">
                <h4> <img src="{{asset('img/icon2.png')}}" alt="settings">{{__('Mileage')}}</h4>
                    <p>{{$statement->mileage}} {{__('km')}}</p>
                </div>
                @if ($statement->wheel_disk)
                    <div class="car_body_line">
                        <h4> <img src="img/icon3.png" alt="settings">Անվահեծ</h4>
                        <p>16 դյույմ</p>
                    </div>  
                @endif                
                <div class="car_body_line">
                    <h4> <img src="{{ asset('img/icon4.png')}}" alt="settings">{{__('Doors')}}</h4>
                    <p>{{ $statement->doors}}</p>
                </div>
                <div class="car_body_line">
                    <h4> <img src="{{ asset('img/icon5.png')}}" alt="settings">{{__('Steering_wheel')}}</h4>
                    <p>{{$statement->sw_type}}</p>
                </div>
                <div class="car_body_line">
                    <h4> <img src="{{ asset('img/icon6.png')}}" alt="settings">{{ __('Pistons')}}</h4>
                    <p>{{ $statement->pistons}}</p>
                </div>
                <div class="car_body_line">
                    <h4> <img src="{{ asset('img/icon7.png')}}" alt="settings">{{__('Engine')}}</h4>
                    <p>{{ __("e_types.$statement->e_type")}}</p>
                </div>
                <div class="car_body_line">
                    {{-- <h4> <img src="{{ asset('img/icon7.png')}}" alt="settings">{{__('Engine')}}</h4> --}}
                    <p>
                        @if ($statement->customs === 0)
                        <span class="txt-my-danger">{{ __('Customs_not_cleared')}}</span>
                        @else
                        <span class="txt-my-success">{{ __('Customs_cleared')}}</span>
                        @endif
                    </p>
                </div>
                <div class="car_body_line">
                    {{-- <h4> <img src="{{ asset('img/icon7.png')}}" alt="settings">{{__('Description')}}</h4> --}}
                    <p>{{ $statement->description}}</p>
                </div>
            </div>
            <div class="car_item_contact_section">
                <div class="item_contact phone">
                    <h3>Հեռ. համարներ</h3>
                    <p class="telephone">
                        <a href="tel:+37477777777">
                            <img src="{{ asset('img/call.png')}}" alt="call"> +374 77 77-77-77
                        </a>
                        <span class="user_tel">Անուն Ազգանուն Տնօրեն</span> 
                    </p>
                    <p class="telephone"> 
                        <a href="tel:+37477777777">
                            <img src="{{ asset('img/call.png')}}" alt="call"> +374 77 77-77-77
                        </a>
                        <span class="user_tel">Անուն Ազգանուն Մենեջեր</span> 
                    </p>
                </div>
                <div class="item_contact mail">
                    <h3> էլ. հասցեներ</h3>
                    <p class="email"> 
                        <a href="email:director@test.com">
                            <img src="{{ asset('img/envelope.png')}}" alt="envelope"> director@test.com
                        </a>
                        <span class="user_email">Անուն Ազգանուն Տնօրեն</span> 
                    </p>
                    <p class="email"> 
                        <a href="email:director@test.com">
                            <img src="{{ asset('img/envelope.png')}}" alt="envelope"> director@test.com
                        </a>
                        <span class="user_email">Անուն Ազգանուն Մենեջեր</span> 
                    </p>
                </div>
                {{-- <div class="item_contact social">
                    <h3>Սոցիալական կայքեր</h3>
                    <p>
                        <a href="https://www.facebook.com" target="_blank"> 
                            <img src="{{ asset('img/facebook.png')}}" alt="facebook">
                            Facebook
                        </a>
                    </p>
                    <p>
                        <a href="https://www.youtube.com" target="_blank">
                            <img src="{{ asset('img/youtube.png')}}" alt="youtube">
                            YouTube
                        </a>
                    </p>
                    <p>
                        <a href="https://www.instagram.com" target="_blank">
                            <img src="{{ asset('img/instagram.png')}}" alt="instagram">
                            Instagram
                        </a>
                    </p>
                </div> --}}
            </div>
        </div>
    </div>
</section>
</main>

@endsection