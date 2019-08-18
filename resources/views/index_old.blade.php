@extends('layouts.index')
<script>
    let models = Array();
    let carmodels = {!! $carmodels !!}
    let select_model = "{{  __('Model')}}"
    // console.log(carmodels);
    // console.log(models);
    // console.log(select_any);    
</script>

@section('content')

<section class="slider">
    <div class="fade">
        <div class="slider_item">
            <div class="slider_content">
                <h3>Toyota Camry 2090</h3>
                <p>այս մեքենան ներկա պահին գտնվում է ԱՄՆում, և...</p>
                <a href="#">
                    Տեսնել ավելին
                </a>
            </div>
            <img src="{{ asset('img/slider1.jpg') }}" alt="slider">
        </div>
        <div class="slider_item">
            <div class="slider_content">
                <h3>Kia Kia Kia Kia 2090</h3>
                <p>այս մեքենան ներկա պահին գտնվում է Չինաստանում, և...</p>
                <a href="#">
                    Տեսնել ավելին
                </a>
            </div>
            <img src="{{ asset('img/slider2.jpg') }}" alt="slider">
        </div>
        <div class="slider_item">
            <div class="slider_content">
                <h3>Lamborgini super car</h3>
                <p>այս մեքենան ներկա պահին գտնվում է Կանադայում, և...</p>
                <a href="#">
                    Տեսնել ավելին
                </a>
            </div>
            <img src="{{ asset('img/slider3.jpg') }}" alt="slider">
        </div>
    </div>
</section>
<main>
    <div class="btn-up"><i class="fa fa-chevron-up"></i></div>
    <section class="main_top">
        <section class="main_top_items container">
            <a href="#" class="main_top_item">
                <div class="main_top_item_icon">
                    <img src="{{ asset('img/carIcon.png') }}" alt="icon">
                </div>
                <div class="main_top_item_text">
                    ԳՆԵԼ ԸՆՏՐՎԱԾ ՄԵՔԵՆԱՆ
                </div>
            </a>
            <a href="#" class="main_top_item">
                <div class="main_top_item_icon">
                    <img src="{{ asset('img/keyIcon.png') }}" alt="icon">
                </div>
                <div class="main_top_item_text">
                    ՎԱՃԱՌԵԼ ՄԵՔԵՆԱՆ
                </div>
            </a>
            <a href="#" class="main_top_item">
                <div class="main_top_item_icon">
                    <img src="{{ asset('img/checkIcon.png') }}" alt="icon">
                </div>
                <div class="main_top_item_text">
                    ԿԱՏԱՐԵԼ ՆԱԽՆԱԿԱՆ ՊԱՏՎԵՐ
                </div>
            </a>
        </section>
    </section>
    <section class="main_filter">
        <section class="main_filter_items container">
            <h1 class="section_title">ԳՏԻՐ ՔՈ ՄԵՔԵՆԱՆ</h1>
            <div class="main_filter_select">
                {{-- <select>
                    <option value="0">{{ __('Make')}}</option>
                </select> --}}
                <select class="form-control" name="make_id" id="make_id">
                        <option value="0">{{ __('Make')}}</option>
                    @forelse ($makes as $make)
                        <option value="{{$make->id}}" @if (old('make_id') == $make->id) {{ 'selected' }} @endif>{{$make->title}}</option>
                    @empty
                        <option value="0">{{__('Select_any')}}</option>
                    @endforelse                                            
                </select>
                {{-- <select>
                    <option>Մոդել</option>
                </select> --}}
                                                                                             
                <select class="form-control" name="model_id" id="model_id" disabled>
                    <option value="0">{{ __('Model')}}</option>                                            
                </select>
                <input type="number" placeholder="Մին. արժեք" min="0">
                <input type="number" placeholder="Մաքս. արժեք" min="0">
                <select>
                    <option>Տարի</option>
                </select>
                <select>
                    <option>Գույն</option>
                </select>
                <select>
                    <option>Տեսակը</option>
                </select>
                <button class="filtr_searchBtn"> 
                    Որոնել <img src="{{ asset('img/search.png') }}" alt="search">
                </button>
            </div>
            <div class="main_filter_categories">
                <a href="#" class="categories_item hover">
                    <div class="categories_item_cover">
                        <img src="{{ asset('img/delivery.png') }}" alt="item">
                    </div>
                    <div class="categories_item_text">
                        Բեռնատար
                    </div>
                </a>
                <a href="#" class="categories_item hover">
                    <div class="categories_item_cover">
                        <img src="{{ asset('img/bike.png') }}" alt="item">
                    </div>
                    <div class="categories_item_text">
                        Հեծանիվ
                    </div>
                </a>
                <a href="#" class="categories_item hover">
                    <div class="categories_item_cover">
                        <img src="{{ asset('img/car.png') }}" alt="item">
                    </div>
                    <div class="categories_item_text">
                        Մարդատար
                    </div>
                </a>
                <a href="#" class="categories_item hover">
                    <div class="categories_item_cover">
                        <img src="{{ asset('img/delivery.png') }}" alt="item">
                    </div>
                    <div class="categories_item_text">
                        Բեռնատար
                    </div>
                </a>
                <a href="#" class="categories_item hover">
                    <div class="categories_item_cover">
                        <img src="{{ asset('img/bike.png') }}" alt="item">
                    </div>
                    <div class="categories_item_text">
                        Հեծանիվ
                    </div>
                </a>
                <a href="#" class="categories_item hover">
                    <div class="categories_item_cover">
                        <img src="{{ asset('img/car.png') }}" alt="item">
                    </div>
                    <div class="categories_item_text">
                        Մարդատար
                    </div>
                </a>
                <a href="#" class="categories_item hover">
                    <div class="categories_item_cover">
                        <img src="{{ asset('img/car.png') }}" alt="item">
                    </div>
                    <div class="categories_item_text">
                        Մարդատար
                    </div>
                </a>
                <a href="#" class="categories_item hover">
                    <div class="categories_item_cover">
                        <img src="{{ asset('img/car.png') }}" alt="item">
                    </div>
                    <div class="categories_item_text">
                        Մարդատար
                    </div>
                </a>
            </div>
        </section>
    </section>
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
                <img src="img/bmw.jpg" alt="bmw">
            </div>
            <h3><a href="item.html">BMW X6</a></h3>
            <p>Վազքը՝ 233 կմ/ժ</p>
            <p class="price">288 <span class="currency" data-currency="$">$</span> </p>
            <a href="item.html" class="buyBtn">
                Գնել
                <img src="img/card.png" alt="card">
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
    <section class="advertisement container">
        <img src="{{ asset('img/banner.jpg') }}" alt="banner">
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
</main>


@endsection