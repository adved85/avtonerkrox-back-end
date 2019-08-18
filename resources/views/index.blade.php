@extends('layouts.index')


@section('content')
<script>
        let models = Array();
        let carmodels = {!! $carmodels !!}
        let select_model = "{{  __('Model')}}"
        // console.log(carmodels);
        // console.log(models);
        // console.log(select_any);    
</script>
<style>
    .modal .modal_item{
        padding: 10px 15px;
    }
    .modal .modal_item form input{
        padding: 10px 15px;
    }
</style>

@include('includes/slider')
<main>
    <div class="btn-up"><i class="fa fa-chevron-up"></i></div>
    <section class="main_top">
        <section class="main_top_items container">
            @guest
            <a href="{{route('register', app()->getLocale())}}" class="main_top_item">
                <div class="main_top_item_icon">
                    <img src="{{ asset('img/carIcon.png') }}" alt="icon">
                </div>
                <div class="main_top_item_text">
                    ԳՆԵԼ ԸՆՏՐՎԱԾ ՄԵՔԵՆԱՆ
                </div>
            </a>
            <a href="{{route('register', app()->getLocale())}}" class="main_top_item">
                <div class="main_top_item_icon">
                    <img src="{{ asset('img/keyIcon.png') }}" alt="icon">
                </div>
                <div class="main_top_item_text">
                    ՎԱՃԱՌԵԼ ՄԵՔԵՆԱՆ
                </div>
            </a>
            <a href="#main_filter_section" class="main_top_item">
                <div class="main_top_item_icon">
                    <img src="{{ asset('img/checkIcon.png') }}" alt="icon">
                </div>
                <div class="main_top_item_text">
                    ԿԱՏԱՐԵԼ ՆԱԽՆԱԿԱՆ ՊԱՏՎԵՐ
                </div>
            </a>
            @else
            <a href="#main_filter_section" class="main_top_item">
                    <div class="main_top_item_icon">
                        <img src="{{ asset('img/carIcon.png') }}" alt="icon">
                    </div>
                    <div class="main_top_item_text">
                        ԳՆԵԼ ԸՆՏՐՎԱԾ ՄԵՔԵՆԱՆ
                    </div>
                </a>
                <a href="#main_filter_section" class="main_top_item">
                    <div class="main_top_item_icon">
                        <img src="{{ asset('img/keyIcon.png') }}" alt="icon">
                    </div>
                    <div class="main_top_item_text">
                        ՎԱՃԱՌԵԼ ՄԵՔԵՆԱՆ
                    </div>
                </a>
                <a href="#main_filter_section" class="main_top_item">
                    <div class="main_top_item_icon">
                        <img src="{{ asset('img/checkIcon.png') }}" alt="icon">
                    </div>
                    <div class="main_top_item_text">
                        ԿԱՏԱՐԵԼ ՆԱԽՆԱԿԱՆ ՊԱՏՎԵՐ
                    </div>
                </a>
            @endguest
        </section>
    </section>
    <section id="main_filter_section" class="main_filter">
        <section class="main_filter_items"><!-- cut  container -->
            <h1 class="section_title">ԳՏԻՐ ՔՈ ՄԵՔԵՆԱՆ</h1>
            <div class="main_filter_select">
            <form action="{{route('search', app()->getLocale())}}/#search_target" method="GET">
                
                <!-- Mark  -->
                <select class="form-control" name="make_id" id="make_id">
                        <option value="0">{{ __('Make')}}</option>
                    @forelse ($makes as $make)
                        <option value="{{$make->id}}" @if (old('make_id') == $make->id) {{ 'selected' }} @endif>{{$make->title}}</option>
                    @empty
                        <option value="0">{{__('Select_any')}}</option>
                    @endforelse                                            
                </select>
                
                <!-- Model -->
                <select class="form-control" name="model_id" id="model_id" disabled>
                    <option value="0">{{ __('Model')}}</option>                                            
                </select>

                <input type="text" placeholder="Մին. արժեք" pattern="\d*" maxlength="10" name="price_start" id="price_start" value="{{ old('price_start')}}">
                <input type="text" placeholder="Մաքս. արժեք" pattern="\d*" maxlength="10" name="price_end" id="price_end" value="{{ old('price_end')}}">
                
                <!-- Year Start -->
                <select name="year_start" id="year_start" class="form-control">
                    <option value="0">{{ __('Year_start')}}</option>
                    @for ($j = date('Y'); $j > 1930; $j--)
                        <option value="{{$j}}" @if (old('year_start') == $j) {{ 'selected' }} @endif>{{$j}}</option>
                    @endfor
                </select>
                <!-- Year End -->
                <select name="year_end" id="year_end" class="form-control">
                    <option value="0">{{ __('Year_end')}}</option>
                    @for ($j = date('Y'); $j > 1930; $j--)
                        <option value="{{$j}}" @if (old('year_end') == $j) {{ 'selected' }} @endif>{{$j}}</option>
                    @endfor
                </select>

                {{-- <select>
                    <option>Տեսակը</option>
                </select> --}}
                                       
                <select name="body_type_id" id="body_type_id" class="form-control">
                    <option value="0">{{__('Body')}}</option>
                    @forelse ($body_types as $body)                                                
                        <option value="{{$body->id}}" @if (old('body_type_id') == $body->id) {{ 'selected' }} @endif>{{ __("b_types.$body->b_type")}}</option>
                    @empty
                        <option value="0">{{__('Body')}}</option>
                    @endforelse
                </select>

                {{-- <button class="filtr_searchBtn"> 
                    Որոնել <img src="{{ asset('img/search.png') }}" alt="search">
                </button> --}}
                @csrf
                
                <button type="submit" class="search-btn">
                    {{__('Search')}}
                    @isset($search_statements)
                    {{ count($search_statements)}}
                    @endisset
                </button>
            </form>
            </div>
            <div class="main_filter_categories">
                <a href="{{route('search',['locale'=>app()->getLocale(),'body_type_id'=>1] )}}/#search_target" class="categories_item hover">
                    <div class="categories_item_cover">
                        <img src="{{ asset('img/body_types/sedan.png') }}" alt="item">
                    </div>
                    <div class="categories_item_text">
                        {{__('b_types.sedan')}}
                    </div>
                </a>
                <a href="{{route('search',['locale'=>app()->getLocale(),'body_type_id'=>2] )}}/#search_target" class="categories_item hover">
                    <div class="categories_item_cover">
                        <img src="{{ asset('img/body_types/hatchback.png') }}" alt="item">
                    </div>
                    <div class="categories_item_text">
                        {{__('b_types.hatchback')}}
                    </div>
                </a>
                <a href="{{route('search',['locale'=>app()->getLocale(),'body_type_id'=>3] )}}/#search_target" class="categories_item hover">
                    <div class="categories_item_cover">
                        <img src="{{ asset('img/body_types/wagon.png') }}" alt="item">
                    </div>
                    <div class="categories_item_text">
                        {{__('b_types.wagon')}}
                    </div>
                </a>
                <a href="{{route('search',['locale'=>app()->getLocale(),'body_type_id'=>4] )}}/#search_target" class="categories_item hover">
                    <div class="categories_item_cover">
                        <img src="{{ asset('img/body_types/coupe.png') }}" alt="item">
                    </div>
                    <div class="categories_item_text">
                        {{__('b_types.coupe')}}
                    </div>
                </a>
                <a href="{{route('search',['locale'=>app()->getLocale(),'body_type_id'=>5] )}}/#search_target" class="categories_item hover">
                    <div class="categories_item_cover">
                        <img src="{{ asset('img/body_types/convertible.png') }}" alt="item">
                    </div>
                    <div class="categories_item_text">
                        {{__('b_types.convertible')}}
                    </div>
                </a>
                <a href="{{route('search',['locale'=>app()->getLocale(),'body_type_id'=>6] )}}/#search_target" class="categories_item hover">
                    <div class="categories_item_cover">
                        <img src="{{ asset('img/body_types/suv-tuck.png') }}" alt="item">
                    </div>
                    <div class="categories_item_text">
                        {{__('b_types.SUV / truck')}}
                    </div>
                </a>
                <a href="{{route('search',['locale'=>app()->getLocale(),'body_type_id'=>7] )}}/#search_target" class="categories_item hover">
                    <div class="categories_item_cover">
                        <img src="{{ asset('img/body_types/pickup.png') }}" alt="item">
                    </div>
                    <div class="categories_item_text">
                        {{__('b_types.pickup truck')}}
                    </div>
                </a>
                <a href="{{route('search',['locale'=>app()->getLocale(),'body_type_id'=>9] )}}/#search_target" class="categories_item hover">
                    <div class="categories_item_cover">
                        <img src="{{ asset('img/body_types/van.png') }}" alt="item">
                    </div>
                    <div class="categories_item_text">
                        {{__('b_types.van')}}
                    </div>
                </a>
            </div>
        </section>
    </section>


@isset($search_statements)
    <section class="car_section container search-results-section" id="search_target">       
    <h1 class="section_title">{{__('Searchin_results')}}</h1>
        @forelse ($search_statements as $item)
            <div class="car_section_item hover">
                <div class="car_section_item_cover">
                    <div class="follow">
                        {{-- dont delete this --}}
                        {{-- <p>Ավելացնել նախընտրածների մեջ</p>
                        <a href="#">
                            <img src="{{ asset('img/follow.png') }}" alt="follow">
                        </a> --}}
                    </div>
                    <img src="{{ asset($item->thumb) }}" alt="{{$item->thumb}}">
                </div>
                <div class="car_section_item_pover">
                    <h3><a href="{{route('item',['locale'=>app()->getLocale(),$item])}}" target="_blank">
                        {{$item->make_title}} {{$item->car_title}}
                    </a></h3>
                    <p>{{__('Mileage')}}՝ {{$item->mileage}} {{__('km')}}</p>
                    <p class="price">{{$item->price}}<span class="currency" data-currency="$">{{$item->crc_symbol}}</span></p>
                    <p class="details">
                        {{ __("b_types.$item->b_type")}} ,
                        {{ __("g_type.$item->g_type")}} ,
                        {{ __("d_type.$item->d_type")}} ,
                        {{ __("sw_type.$item->sw_type")}} ,
                        {{ __("e_types.$item->e_type")}} ,
                        {{ __("colors.$item->color")}} 
                    </p>
                    <p>
                        @if ($item->customs === 0)
                        <span class="txt-my-danger">{{ __('Customs_not_cleared')}}</span>
                        @else
                        <span class="txt-my-success">{{ __('Customs_cleared')}}</span>
                        @endif
                    </p>
                    <a href="{{route('item',['locale'=>app()->getLocale(),$item])}}" class="buyBtn" target="_blank">
                        {{__('Details')}} &nbsp;
                        {{-- <img src="{{ asset('img/card.png') }}" alt="card"> --}}
                        <i class="fa fa-angle-double-right"></i>
                    </a>
                </div>
            </div>
        @empty
        <h4 class="search-no-result">{{__('No_searching_results')}}</h4>
        @endforelse                  
    </section>
    <div class="container pagination-wrap">
            {{ $search_statements->appends($queryArray)->links() }}
    </div>    
@endisset  

<!--
    <section class="news_scroll container">
        <div class="scroll_block">
            <h1 class="section_title">ՇՏԱՊ</h1>
            <div class="scroll_block_items">
                <a href="#" class="scroll_block_item">
                    <div class="scroll_block_itemCover">
                        <div class="img_desc">ՇՏԱՊ</div>
                        <img src="{{ asset('img/bmw.jpg') }}" alt="">
                    </div>
                    <div class="scroll_block_itemText">
                        <h3>2015 BMW X6 m3</h3>
                        <p>Վազքը՝ 252 կմ/ժ</p>
                        <p>Գույնը՝ Կապույտ</p>
                        <p class="price">19.000 <span class="currency" data-currency="$">$</span> </p>
                    </div>
                </a>
                <a href="#" class="scroll_block_item">
                    <div class="scroll_block_itemCover">
                        <div class="img_desc">ՇՏԱՊ</div>
                        <img src="{{ asset('img/bmw.jpg') }}" alt="">
                    </div>
                    <div class="scroll_block_itemText">
                        <h3>2015 BMW X6 m3</h3>
                        <p>Վազքը՝ 252 կմ/ժ</p>
                        <p>Գույնը՝ Կապույտ</p>
                        <p class="price">19.000 <span class="currency" data-currency="$">$</span> </p>
                    </div>
                </a>
                <a href="#" class="scroll_block_item">
                    <div class="scroll_block_itemCover">
                        <div class="img_desc">ՇՏԱՊ</div>
                        <img src="{{ asset('img/bmw.jpg') }}" alt="">
                    </div>
                    <div class="scroll_block_itemText">
                        <h3>2015 BMW X6 m3</h3>
                        <p>Վազքը՝ 252 կմ/ժ</p>
                        <p>Գույնը՝ Կապույտ</p>
                        <p class="price">19.000 <span class="currency" data-currency="$">$</span> </p>
                    </div>
                </a>
                <a href="#" class="scroll_block_item">
                    <div class="scroll_block_itemCover">
                        <div class="img_desc">ՇՏԱՊ</div>
                        <img src="{{ asset('img/bmw.jpg') }}" alt="">
                    </div>
                    <div class="scroll_block_itemText">
                        <h3>2015 BMW X6 m3</h3>
                        <p>Վազքը՝ 252 կմ/ժ</p>
                        <p>Գույնը՝ Կապույտ</p>
                        <p class="price">19.000 <span class="currency" data-currency="$">$</span> </p>
                    </div>
                </a>
                <a href="#" class="scroll_block_item">
                    <div class="scroll_block_itemCover">
                        <div class="img_desc">ՇՏԱՊ</div>
                        <img src="{{ asset('img/bmw.jpg') }}" alt="">
                    </div>
                    <div class="scroll_block_itemText">
                        <h3>2015 BMW X6 m3</h3>
                        <p>Վազքը՝ 252 կմ/ժ</p>
                        <p>Գույնը՝ Կապույտ</p>
                        <p class="price">19.000 <span class="currency" data-currency="$">$</span> </p>
                    </div>
                </a>
                <a href="#" class="scroll_block_item">
                    <div class="scroll_block_itemCover">
                        <div class="img_desc">ՇՏԱՊ</div>
                        <img src="{{ asset('img/bmw.jpg') }}" alt="">
                    </div>
                    <div class="scroll_block_itemText">
                        <h3>2015 BMW X6 m3</h3>
                        <p>Վազքը՝ 252 կմ/ժ</p>
                        <p>Գույնը՝ Կապույտ</p>
                        <p class="price">19.000 <span class="currency" data-currency="$">$</span> </p>
                    </div>
                </a>
                <a href="#" class="scroll_block_item">
                    <div class="scroll_block_itemCover">
                        <div class="img_desc">ՇՏԱՊ</div>
                        <img src="{{ asset('img/bmw.jpg') }}" alt="">
                    </div>
                    <div class="scroll_block_itemText">
                        <h3>2015 BMW X6 m3</h3>
                        <p>Վազքը՝ 252 կմ/ժ</p>
                        <p>Գույնը՝ Կապույտ</p>
                        <p class="price">19.000 <span class="currency" data-currency="$">$</span> </p>
                    </div>
                </a>
                <a href="#" class="scroll_block_item">
                    <div class="scroll_block_itemCover">
                        <div class="img_desc">ՇՏԱՊ</div>
                        <img src="{{ asset('img/bmw.jpg') }}" alt="">
                    </div>
                    <div class="scroll_block_itemText">
                        <h3>2015 BMW X6 m3</h3>
                        <p>Վազքը՝ 252 կմ/ժ</p>
                        <p>Գույնը՝ Կապույտ</p>
                        <p class="price">19.000 <span class="currency" data-currency="$">$</span> </p>
                    </div>
                </a>
                <a href="#" class="scroll_block_item">
                    <div class="scroll_block_itemCover">
                        <div class="img_desc">ՇՏԱՊ</div>
                        <img src="{{ asset('img/bmw.jpg') }}" alt="">
                    </div>
                    <div class="scroll_block_itemText">
                        <h3>2015 BMW X6 m3</h3>
                        <p>Վազքը՝ 252 կմ/ժ</p>
                        <p>Գույնը՝ Կապույտ</p>
                        <p class="price">19.000 <span class="currency" data-currency="$">$</span> </p>
                    </div>
                </a>
                <a href="#" class="scroll_block_item">
                    <div class="scroll_block_itemCover">
                        <div class="img_desc">ՇՏԱՊ</div>
                        <img src="{{ asset('img/bmw.jpg') }}" alt="">
                    </div>
                    <div class="scroll_block_itemText">
                        <h3>2015 BMW X6 m3</h3>
                        <p>Վազքը՝ 252 կմ/ժ</p>
                        <p>Գույնը՝ Կապույտ</p>
                        <p class="price">19.000 <span class="currency" data-currency="$">$</span> </p>
                    </div>
                </a>
            </div>
        </div>
        <div class="tab">
            <h1 class="section_title">Թաբ</h1>
            <div class="tab_links">
                <div class="tabBtn">Դիլլեռ</div>
                <div class="tabBtn">Թափք</div>
                <div class="tabBtn">Գովազդ</div>
                <div class="tabBtn">Մաքսազերծում</div>
                <div class="tabBtn">Կրեդիտ</div>
            </div>
            <div class="tab_content">
                <div class="tabDash">
                    <div class="tab_items">
                        <div class="tabDash_item"></div>
                        <div class="tabDash_item"></div>
                        <div class="tabDash_item"></div>
                        <div class="tabDash_item"></div>
                        <div class="tabDash_item"></div>
                        <div class="tabDash_item"></div>
                        <div class="tabDash_item"></div>
                        <div class="tabDash_item"></div>
                        <div class="tabDash_item"></div>
                        <div class="tabDash_item"></div>
                        <div class="tabDash_item"></div>
                        <div class="tabDash_item"></div>
                        <div class="tabDash_item"></div>
                        <div class="tabDash_item"></div>
                        <div class="tabDash_item"></div>
                        <div class="tabDash_item"></div>
                    </div>
                </div>
                <div class="tabDash">
                    <div class="tab_items">
                        <div class="tabDash_item"></div>
                        <div class="tabDash_item"></div>
                        <div class="tabDash_item"></div>
                        <div class="tabDash_item"></div>
                        <div class="tabDash_item"></div>
                        <div class="tabDash_item"></div>
                        <div class="tabDash_item"></div>
                        <div class="tabDash_item"></div>
                    </div>
                </div>
                <div class="tabDash tabVideo">
                    <div class="iframe_wrap">
                        <div class="promo">
                            <iframe width="560" height="315" src="https://www.youtube.com/embed/fynCiuhLMSA" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                            
                        </div>
                    </div>
                </div>
                <div class="tabDash">
                    <div class="tab_items">
                        <div class="tabDash_item"></div>
                        <div class="tabDash_item"></div>
                        <div class="tabDash_item"></div>
                        <div class="tabDash_item"></div>
                        <div class="tabDash_item"></div>
                        <div class="tabDash_item"></div>
                        <div class="tabDash_item"></div>
                        <div class="tabDash_item"></div>
                    </div>
                </div>
                <div class="tabDash">
                    <div class="tab_items">
                        <div class="tabDash_item"></div>
                        <div class="tabDash_item"></div>
                        <div class="tabDash_item"></div>
                        <div class="tabDash_item"></div>
                        <div class="tabDash_item"></div>
                        <div class="tabDash_item"></div>
                        <div class="tabDash_item"></div>
                        <div class="tabDash_item"></div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="car_section container">
        <h1 class="section_title">ԹՈՓ ԱՌԱՋԱՐԿՆԵՐ</h1>
        <div class="car_section_item hover">
            <div class="car_section_item_cover">
                <div class="follow">
                    <p>Ավելացնել նախընտրածների մեջ</p>
                    <a href="#">
                        <img src="{{ asset('img/follow.png') }}" alt="follow">
                    </a>
                </div>
                <img src="{{ asset('img/bmw.jpg') }}" alt="bmw">
            </div>
            <h3><a href="item.html">BMW X6</a></h3>
            <p>Վազքը՝ 233 կմ/ժ</p>
            <p class="price">288 <span class="currency" data-currency="$">$</span> </p>
            <a href="item.html" class="buyBtn">
                Գնել
                <img src="{{ asset('img/card.png') }}" alt="card">
            </a>
        </div>
        <div class="car_section_item hover">
            <div class="car_section_item_cover">
                <div class="follow">
                    <p>Ավելացնել նախընտրածների մեջ</p>
                    <a href="#">
                        <img src="{{ asset('img/follow.png') }}" alt="follow">
                    </a>
                </div>
                <img src="{{ asset('img/bmw.jpg') }}" alt="bmw">
            </div>
            <h3><a href="item.html">BMW X6</a></h3>
            <p>Վազքը՝ 233 կմ/ժ</p>
            <p class="price">288 <span class="currency" data-currency="$">$</span> </p>
            <a href="item.html" class="buyBtn">
                Գնել
                <img src="{{ asset('img/card.png') }}" alt="card">
            </a>
        </div>
        <div class="car_section_item hover">
            <div class="car_section_item_cover">
                <div class="follow">
                    <p>Ավելացնել նախընտրածների մեջ</p>
                    <a href="#">
                        <img src="{{ asset('img/follow.png') }}" alt="follow">
                    </a>
                </div>
                <img src="{{ asset('img/bmw.jpg') }}" alt="bmw">
            </div>
            <h3><a href="item.html">BMW X6</a></h3>
            <p>Վազքը՝ 233 կմ/ժ</p>
            <p class="price">288 <span class="currency" data-currency="$">$</span> </p>
            <a href="item.html" class="buyBtn">
                Գնել
                <img src="{{ asset('img/card.png') }}" alt="card">
            </a>
        </div>
        <div class="car_section_item hover">
            <div class="car_section_item_cover">
                <div class="follow">
                    <p>Ավելացնել նախընտրածների մեջ</p>
                    <a href="#">
                        <img src="{{ asset('img/follow.png') }}" alt="follow">
                    </a>
                </div>
                <img src="{{ asset('img/bmw.jpg') }}" alt="bmw">
            </div>
            <h3><a href="item.html">BMW X6</a></h3>
            <p>Վազքը՝ 233 կմ/ժ</p>
            <p class="price">288 <span class="currency" data-currency="$">$</span> </p>
            <a href="item.html" class="buyBtn">
                Գնել
                <img src="{{ asset('img/card.png') }}" alt="card">
            </a>
        </div>
        <div class="car_section_item hover">
            <div class="car_section_item_cover">
                <div class="follow">
                    <p>Ավելացնել նախընտրածների մեջ</p>
                    <a href="#">
                        <img src="{{ asset('img/follow.png') }}" alt="follow">
                    </a>
                </div>
                <img src="{{ asset('img/bmw.jpg') }}" alt="bmw">
            </div>
            <h3><a href="item.html">BMW X6</a></h3>
            <p>Վազքը՝ 233 կմ/ժ</p>
            <p class="price">288 <span class="currency" data-currency="$">$</span> </p>
            <a href="item.html" class="buyBtn">
                Գնել
                <img src="{{ asset('img/card.png') }}" alt="card">
            </a>
        </div>
        <div class="car_section_item hover">
            <div class="car_section_item_cover">
                <div class="follow">
                    <p>Ավելացնել նախընտրածների մեջ</p>
                    <a href="#">
                        <img src="{{ asset('img/follow.png') }}" alt="follow">
                    </a>
                </div>
                <img src="{{ asset('img/bmw.jpg') }}" alt="bmw">
            </div>
            <h3><a href="item.html">BMW X6</a></h3>
            <p>Վազքը՝ 233 կմ/ժ</p>
            <p class="price">288 <span class="currency" data-currency="$">$</span> </p>
            <a href="item.html" class="buyBtn">
                Գնել
                <img src="{{ asset('img/card.png') }}" alt="card">
            </a>
        </div>
        <div class="car_section_item hover">
            <div class="car_section_item_cover">
                <div class="follow">
                    <p>Ավելացնել նախընտրածների մեջ</p>
                    <a href="#">
                        <img src="{{ asset('img/follow.png') }}" alt="follow">
                    </a>
                </div>
                <img src="{{ asset('img/bmw.jpg') }}" alt="bmw">
            </div>
            <h3><a href="item.html">BMW X6</a></h3>
            <p>Վազքը՝ 233 կմ/ժ</p>
            <p class="price">288 <span class="currency" data-currency="$">$</span> </p>
            <a href="item.html" class="buyBtn">
                Գնել
                <img src="{{ asset('img/card.png') }}" alt="card">
            </a>
        </div>
        <div class="car_section_item hover">
            <div class="car_section_item_cover">
                <div class="follow">
                    <p>Ավելացնել նախընտրածների մեջ</p>
                    <a href="#">
                        <img src="{{ asset('img/follow.png') }}" alt="follow">
                    </a>
                </div>
                <img src="{{ asset('img/bmw.jpg') }}" alt="bmw">
            </div>
            <h3><a href="item.html">BMW X6</a></h3>
            <p>Վազքը՝ 233 կմ/ժ</p>
            <p class="price">288 <span class="currency" data-currency="$">$</span> </p>
            <a href="item.html" class="buyBtn">
                Գնել
                <img src="{{ asset('img/card.png') }}" alt="card">
            </a>
        </div>

        <p class="seeMore"><a href="#">Տեսնել ավելին</a></p>
    </section>
-->
    <section class="advertisement container">
        <img src="{{ asset('img/banner.jpg') }}" alt="banner">
    </section>
<!--
    <section class="car_section container">
        <h1 class="section_title">ԹՈՓ ԱՌԱՋԱՐԿՆԵՐ</h1>
        <div class="car_section_item hover">
            <div class="car_section_item_cover">
                <div class="follow">
                    <p>Ավելացնել նախընտրածների մեջ</p>
                    <a href="#">
                        <img src="{{ asset('img/follow.png') }}" alt="follow">
                    </a>
                </div>
                <img src="{{ asset('img/bmw.jpg') }}" alt="bmw">
            </div>
            <h3><a href="item.html">BMW X6</a></h3>
            <p>Վազքը՝ 233 կմ/ժ</p>
            <p class="price">288 <span class="currency" data-currency="$">$</span> </p>
            <a href="item.html" class="buyBtn">
                Գնել
                <img src="{{ asset('img/card.png') }}" alt="card">
            </a>
        </div>
        <div class="car_section_item hover">
            <div class="car_section_item_cover">
                <div class="follow">
                    <p>Ավելացնել նախընտրածների մեջ</p>
                    <a href="#">
                        <img src="{{ asset('img/follow.png') }}" alt="follow">
                    </a>
                </div>
                <img src="{{ asset('img/bmw.jpg') }}" alt="bmw">
            </div>
            <h3><a href="item.html">BMW X6</a></h3>
            <p>Վազքը՝ 233 կմ/ժ</p>
            <p class="price">288 <span class="currency" data-currency="$">$</span> </p>
            <a href="item.html" class="buyBtn">
                Գնել
                <img src="{{ asset('img/card.png') }}" alt="card">
            </a>
        </div>
        <div class="car_section_item hover">
            <div class="car_section_item_cover">
                <div class="follow">
                    <p>Ավելացնել նախընտրածների մեջ</p>
                    <a href="#">
                        <img src="{{ asset('img/follow.png') }}" alt="follow">
                    </a>
                </div>
                <img src="{{ asset('img/bmw.jpg') }}" alt="bmw">
            </div>
            <h3><a href="item.html">BMW X6</a></h3>
            <p>Վազքը՝ 233 կմ/ժ</p>
            <p class="price">288 <span class="currency" data-currency="$">$</span> </p>
            <a href="item.html" class="buyBtn">
                Գնել
                <img src="{{ asset('img/card.png') }}" alt="card">
            </a>
        </div>
        <div class="car_section_item hover">
            <div class="car_section_item_cover">
                <div class="follow">
                    <p>Ավելացնել նախընտրածների մեջ</p>
                    <a href="#">
                        <img src="{{ asset('img/follow.png') }}" alt="follow">
                    </a>
                </div>
                <img src="{{ asset('img/bmw.jpg') }}" alt="bmw">
            </div>
            <h3><a href="item.html">BMW X6</a></h3>
            <p>Վազքը՝ 233 կմ/ժ</p>
            <p class="price">288 <span class="currency" data-currency="$">$</span> </p>
            <a href="item.html" class="buyBtn">
                Գնել
                <img src="{{ asset('img/card.png') }}" alt="card">
            </a>
        </div>
        <div class="car_section_item hover">
            <div class="car_section_item_cover">
                <div class="follow">
                    <p>Ավելացնել նախընտրածների մեջ</p>
                    <a href="#">
                        <img src="{{ asset('img/follow.png') }}" alt="follow">
                    </a>
                </div>
                <img src="{{ asset('img/bmw.jpg') }}" alt="bmw">
            </div>
            <h3><a href="item.html">BMW X6</a></h3>
            <p>Վազքը՝ 233 կմ/ժ</p>
            <p class="price">288 <span class="currency" data-currency="$">$</span> </p>
            <a href="item.html" class="buyBtn">
                Գնել
                <img src="{{ asset('img/card.png') }}" alt="card">
            </a>
        </div>
        <div class="car_section_item hover">
            <div class="car_section_item_cover">
                <div class="follow">
                    <p>Ավելացնել նախընտրածների մեջ</p>
                    <a href="#">
                        <img src="{{ asset('img/follow.png') }}" alt="follow">
                    </a>
                </div>
                <img src="{{ asset('img/bmw.jpg') }}" alt="bmw">
            </div>
            <h3><a href="item.html">BMW X6</a></h3>
            <p>Վազքը՝ 233 կմ/ժ</p>
            <p class="price">288 <span class="currency" data-currency="$">$</span> </p>
            <a href="item.html" class="buyBtn">
                Գնել
                <img src="{{ asset('img/card.png') }}" alt="card">
            </a>
        </div>
        <div class="car_section_item hover">
            <div class="car_section_item_cover">
                <div class="follow">
                    <p>Ավելացնել նախընտրածների մեջ</p>
                    <a href="#">
                        <img src="{{ asset('img/follow.png') }}" alt="follow">
                    </a>
                </div>
                <img src="{{ asset('img/bmw.jpg') }}" alt="bmw">
            </div>
            <h3><a href="item.html">BMW X6</a></h3>
            <p>Վազքը՝ 233 կմ/ժ</p>
            <p class="price">288 <span class="currency" data-currency="$">$</span> </p>
            <a href="item.html" class="buyBtn">
                Գնել
                <img src="{{ asset('img/card.png') }}" alt="card">
            </a>
        </div>
        <div class="car_section_item hover">
            <div class="car_section_item_cover">
                <div class="follow">
                    <p>Ավելացնել նախընտրածների մեջ</p>
                    <a href="#">
                        <img src="{{ asset('img/follow.png') }}" alt="follow">
                    </a>
                </div>
                <img src="{{ asset('img/bmw.jpg') }}" alt="bmw">
            </div>
            <h3><a href="item.html">BMW X6</a></h3>
            <p>Վազքը՝ 233 կմ/ժ</p>
            <p class="price">288 <span class="currency" data-currency="$">$</span> </p>
            <a href="item.html" class="buyBtn">
                Գնել
                <img src="{{ asset('img/card.png') }}" alt="card">
            </a>
        </div>

        
        <p class="seeMore"><a href="#">Տեսնել ավելին</a></p>
    </section>
-->
</main>


@endsection