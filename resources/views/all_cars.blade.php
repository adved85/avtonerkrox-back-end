@extends('layouts.index')

@section('content')
<style>
    .modal .modal_item{
        padding: 10px 15px;
    }
    .modal .modal_item form input{
        padding: 10px 15px;
    }
</style>

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
            <img src="{{ asset('img/slider1.jpg')}}" alt="slider">
        </div>
        <div class="slider_item">
            <div class="slider_content">
                <h3>Kia Kia Kia Kia 2090</h3>
                <p>այս մեքենան ներկա պահին գտնվում է Չինաստանում, և...</p>
                <a href="#">
                    Տեսնել ավելին
                </a>
            </div>
            <img src="{{ asset('img/slider2.jpg')}}" alt="slider">
        </div>
        <div class="slider_item">
            <div class="slider_content">
                <h3>Lamborgini super car</h3>
                <p>այս մեքենան ներկա պահին գտնվում է Կանադայում, և...</p>
                <a href="#">
                    Տեսնել ավելին
                </a>
            </div>
            <img src="{{ asset('img/slider3.jpg')}}" alt="slider">
        </div>
    </div>
</section>
<main>
    <div class="btn-up"><i class="fa fa-chevron-up"></i></div>
    <section class="all_rent_carsPage container">
        <section class="all_rent_carsPage_filter">
            <div class="filter_left">
                <h2 class="section_title">ՓՆՏՐԵԼ ՖԻԼՏՐՈՎ</h2>
                <select>
                    <option>Մարկ</option>
                </select>
                <select>
                    <option>Մոդել</option>
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
                <select>
                    <option>Տեսակը</option>
                </select>
                <select>
                    <option>Տեսակը</option>
                </select>
                <select>
                    <option>Տեսակը</option>
                </select>
                <button class="filtr_searchBtn"> 
                    Որոնել <img src="{{ asset('img/search.png')}}" alt="search">
                </button>

                <div class="search_fromName">
                    <p>Կարող եք փնտրել Ձեր նախընտրած մեքենան գրելով միայն վերնագիրը, օրինակ ՝ BMW X6 2009 թվական </p>
                    <input type="search" placeholder="որոնել անունով">
                    <button class="filtr_searchBtn fromName"> 
                        Որոնել <img src="{{ asset('img/search.png')}}" alt="search">
                    </button>
                </div>
            </div>
            <div class="filter_right">
                <h2 class="section_title">ԹՈՓ ՄԵՔԵՆԱՆԵՐ</h2>
                <div class="multiple-items">
                    <a href="item.html" class="all_rent_slider">
                        <img src="{{ asset('img/bmw.jpg')}}" alt="bmv">
                    </a>
                    <a href="item.html" class="all_rent_slider">
                        <img src="{{ asset('img/bmw.jpg')}}" alt="bmv">
                    </a>
                    <a href="item.html" class="all_rent_slider">
                        <img src="{{ asset('img/bmw.jpg')}}" alt="bmv">
                    </a>
                    <a href="item.html" class="all_rent_slider">
                        <img src="{{ asset('img/bmw.jpg')}}" alt="bmv">
                    </a>
                    <a href="item.html" class="all_rent_slider">
                        <img src="{{ asset('img/bmw.jpg')}}" alt="bmv">
                    </a>
                    <a href="item.html" class="all_rent_slider">
                        <img src="{{ asset('img/bmw.jpg')}}" alt="bmv">
                    </a>
                    <a href="item.html" class="all_rent_slider">
                        <img src="{{ asset('img/bmw.jpg')}}" alt="bmv">
                    </a>
                    <a href="item.html" class="all_rent_slider">
                        <img src="{{ asset('img/bmw.jpg')}}" alt="bmv">
                    </a>
                    <a href="item.html" class="all_rent_slider">
                        <img src="{{ asset('img/bmw.jpg')}}" alt="bmv">
                    </a>
                    <a href="item.html" class="all_rent_slider">
                        <img src="{{ asset('img/bmw.jpg')}}" alt="bmv">
                    </a>
                    <a href="item.html" class="all_rent_slider">
                        <img src="{{ asset('img/bmw.jpg')}}" alt="bmv">
                    </a>
                    <a href="item.html" class="all_rent_slider">
                        <img src="{{ asset('img/bmw.jpg')}}" alt="bmv">
                    </a>


                </div>
            </div>
        </section>
        <section class="car_section container">
        <h1 class="section_title">BMW</h1>
        <div class="car_section_item hover">
            <div class="car_section_item_cover">
                <div class="follow">
                    <p>Ավելացնել նախընտրածների մեջ</p>
                    <a href="#">
                        <img src="{{ asset('img/follow.png')}}" alt="follow">
                    </a>
                </div>
                <img src="{{ asset('img/bmw.jpg')}}" alt="bmw">
            </div>
            <h3><a href="item.html">BMW X6</a></h3>
            <p>Վազքը՝ 233 կմ/ժ</p>
            <p class="price">288 <span class="currency" data-currency="$">$</span> </p>
            <a href="item.html" class="buyBtn">
                Գնել
                <img src="{{ asset('img/card.png')}}" alt="card">
            </a>
        </div>
        <div class="car_section_item hover">
            <div class="car_section_item_cover">
                <div class="follow">
                    <p>Ավելացնել նախընտրածների մեջ</p>
                    <a href="#">
                        <img src="{{ asset('img/follow.png')}}" alt="follow">
                    </a>
                </div>
                <img src="{{ asset('img/bmw.jpg')}}" alt="bmw">
            </div>
            <h3><a href="item.html">BMW X6</a></h3>
            <p>Վազքը՝ 233 կմ/ժ</p>
            <p class="price">288 <span class="currency" data-currency="$">$</span> </p>
            <a href="item.html" class="buyBtn">
                Գնել
                <img src="{{ asset('img/card.png')}}" alt="card">
            </a>
        </div>
        <div class="car_section_item hover">
            <div class="car_section_item_cover">
                <div class="follow">
                    <p>Ավելացնել նախընտրածների մեջ</p>
                    <a href="#">
                        <img src="{{ asset('img/follow.png')}}" alt="follow">
                    </a>
                </div>
                <img src="{{ asset('img/bmw.jpg')}}" alt="bmw">
            </div>
            <h3><a href="item.html">BMW X6</a></h3>
            <p>Վազքը՝ 233 կմ/ժ</p>
            <p class="price">288 <span class="currency" data-currency="$">$</span> </p>
            <a href="item.html" class="buyBtn">
                Գնել
                <img src="{{ asset('img/card.png')}}" alt="card">
            </a>
        </div>
        <div class="car_section_item hover">
            <div class="car_section_item_cover">
                <div class="follow">
                    <p>Ավելացնել նախընտրածների մեջ</p>
                    <a href="#">
                        <img src="{{ asset('img/follow.png')}}" alt="follow">
                    </a>
                </div>
                <img src="{{ asset('img/bmw.jpg')}}" alt="bmw">
            </div>
            <h3><a href="item.html">BMW X6</a></h3>
            <p>Վազքը՝ 233 կմ/ժ</p>
            <p class="price">288 <span class="currency" data-currency="$">$</span> </p>
            <a href="item.html" class="buyBtn">
                Գնել
                <img src="{{ asset('img/card.png')}}" alt="card">
            </a>
        </div>
        <div class="car_section_item hover">
            <div class="car_section_item_cover">
                <div class="follow">
                    <p>Ավելացնել նախընտրածների մեջ</p>
                    <a href="#">
                        <img src="{{ asset('img/follow.png')}}" alt="follow">
                    </a>
                </div>
                <img src="{{ asset('img/bmw.jpg')}}" alt="bmw">
            </div>
            <h3><a href="item.html">BMW X6</a></h3>
            <p>Վազքը՝ 233 կմ/ժ</p>
            <p class="price">288 <span class="currency" data-currency="$">$</span> </p>
            <a href="item.html" class="buyBtn">
                Գնել
                <img src="{{ asset('img/card.png')}}" alt="card">
            </a>
        </div>
        <div class="car_section_item hover">
            <div class="car_section_item_cover">
                <div class="follow">
                    <p>Ավելացնել նախընտրածների մեջ</p>
                    <a href="#">
                        <img src="{{ asset('img/follow.png')}}" alt="follow">
                    </a>
                </div>
                <img src="{{ asset('img/bmw.jpg')}}" alt="bmw">
            </div>
            <h3><a href="item.html">BMW X6</a></h3>
            <p>Վազքը՝ 233 կմ/ժ</p>
            <p class="price">288 <span class="currency" data-currency="$">$</span> </p>
            <a href="item.html" class="buyBtn">
                Գնել
                <img src="{{ asset('img/card.png')}}" alt="card">
            </a>
        </div>
        <div class="car_section_item hover">
            <div class="car_section_item_cover">
                <div class="follow">
                    <p>Ավելացնել նախընտրածների մեջ</p>
                    <a href="#">
                        <img src="{{ asset('img/follow.png')}}" alt="follow">
                    </a>
                </div>
                <img src="{{ asset('img/bmw.jpg')}}" alt="bmw">
            </div>
            <h3><a href="item.html">BMW X6</a></h3>
            <p>Վազքը՝ 233 կմ/ժ</p>
            <p class="price">288 <span class="currency" data-currency="$">$</span> </p>
            <a href="item.html" class="buyBtn">
                Գնել
                <img src="{{ asset('img/card.png')}}" alt="card">
            </a>
        </div>
        <div class="car_section_item hover">
            <div class="car_section_item_cover">
                <div class="follow">
                    <p>Ավելացնել նախընտրածների մեջ</p>
                    <a href="#">
                        <img src="{{ asset('img/follow.png')}}" alt="follow">
                    </a>
                </div>
                <img src="{{ asset('img/bmw.jpg')}}" alt="bmw">
            </div>
            <h3><a href="item.html">BMW X6</a></h3>
            <p>Վազքը՝ 233 կմ/ժ</p>
            <p class="price">288 <span class="currency" data-currency="$">$</span> </p>
            <a href="item.html" class="buyBtn">
                Գնել
                <img src="{{ asset('img/card.png')}}" alt="card">
            </a>
        </div>
        

        <p class="seeMore"><a href="#">Տեսնել ավելին</a></p>
        </section>
        <section class="car_section container">
                <h1 class="section_title">MERCEDES</h1>
                <div class="car_section_item hover">
                    <div class="car_section_item_cover">
                        <div class="follow">
                            <p>Ավելացնել նախընտրածների մեջ</p>
                            <a href="#">
                                <img src="{{asset('img/follow.png')}}" alt="follow">
                            </a>
                        </div>
                        <img src="{{asset('img/bmw.jpg')}}" alt="bmw">
                    </div>
                    <h3><a href="item.html">BMW X6</a></h3>
                    <p>Վազքը՝ 233 կմ/ժ</p>
                    <p class="price">288 <span class="currency" data-currency="$">$</span> </p>
                    <a href="item.html" class="buyBtn">
                        Գնել
                        <img src="{{asset('img/card.png')}}" alt="card">
                    </a>
                </div>
                <div class="car_section_item hover">
                    <div class="car_section_item_cover">
                        <div class="follow">
                            <p>Ավելացնել նախընտրածների մեջ</p>
                            <a href="#">
                                <img src="{{asset('img/follow.png')}}" alt="follow">
                            </a>
                        </div>
                        <img src="{{asset('img/bmw.jpg')}}" alt="bmw">
                    </div>
                    <h3><a href="item.html">BMW X6</a></h3>
                    <p>Վազքը՝ 233 կմ/ժ</p>
                    <p class="price">288 <span class="currency" data-currency="$">$</span> </p>
                    <a href="item.html" class="buyBtn">
                        Գնել
                        <img src="{{asset('img/card.png')}}" alt="card">
                    </a>
                </div>
                <div class="car_section_item hover">
                    <div class="car_section_item_cover">
                        <div class="follow">
                            <p>Ավելացնել նախընտրածների մեջ</p>
                            <a href="#">
                                <img src="{{asset('img/follow.png')}}" alt="follow">
                            </a>
                        </div>
                        <img src="{{asset('img/bmw.jpg')}}" alt="bmw">
                    </div>
                    <h3><a href="item.html">BMW X6</a></h3>
                    <p>Վազքը՝ 233 կմ/ժ</p>
                    <p class="price">288 <span class="currency" data-currency="$">$</span> </p>
                    <a href="item.html" class="buyBtn">
                        Գնել
                        <img src="{{asset('img/card.png')}}" alt="card">
                    </a>
                </div>
                <div class="car_section_item hover">
                    <div class="car_section_item_cover">
                        <div class="follow">
                            <p>Ավելացնել նախընտրածների մեջ</p>
                            <a href="#">
                                <img src="{{asset('img/follow.png')}}" alt="follow">
                            </a>
                        </div>
                        <img src="{{asset('img/bmw.jpg')}}" alt="bmw">
                    </div>
                    <h3><a href="item.html">BMW X6</a></h3>
                    <p>Վազքը՝ 233 կմ/ժ</p>
                    <p class="price">288 <span class="currency" data-currency="$">$</span> </p>
                    <a href="item.html" class="buyBtn">
                        Գնել
                        <img src="{{asset('img/card.png')}}" alt="card">
                    </a>
                </div>
                <div class="car_section_item hover">
                    <div class="car_section_item_cover">
                        <div class="follow">
                            <p>Ավելացնել նախընտրածների մեջ</p>
                            <a href="#">
                                <img src="{{asset('img/follow.png')}}" alt="follow">
                            </a>
                        </div>
                        <img src="{{asset('img/bmw.jpg')}}" alt="bmw">
                    </div>
                    <h3><a href="item.html">BMW X6</a></h3>
                    <p>Վազքը՝ 233 կմ/ժ</p>
                    <p class="price">288 <span class="currency" data-currency="$">$</span> </p>
                    <a href="item.html" class="buyBtn">
                        Գնել
                        <img src="{{asset('img/card.png')}}" alt="card">
                    </a>
                </div>
                <div class="car_section_item hover">
                    <div class="car_section_item_cover">
                        <div class="follow">
                            <p>Ավելացնել նախընտրածների մեջ</p>
                            <a href="#">
                                <img src="{{asset('img/follow.png')}}" alt="follow">
                            </a>
                        </div>
                        <img src="{{asset('img/bmw.jpg')}}" alt="bmw">
                    </div>
                    <h3><a href="item.html">BMW X6</a></h3>
                    <p>Վազքը՝ 233 կմ/ժ</p>
                    <p class="price">288 <span class="currency" data-currency="$">$</span> </p>
                    <a href="item.html" class="buyBtn">
                        Գնել
                        <img src="{{asset('img/card.png')}}" alt="card">
                    </a>
                </div>
                <div class="car_section_item hover">
                    <div class="car_section_item_cover">
                        <div class="follow">
                            <p>Ավելացնել նախընտրածների մեջ</p>
                            <a href="#">
                                <img src="{{asset('img/follow.png')}}" alt="follow">
                            </a>
                        </div>
                        <img src="{{asset('img/bmw.jpg')}}" alt="bmw">
                    </div>
                    <h3><a href="item.html">BMW X6</a></h3>
                    <p>Վազքը՝ 233 կմ/ժ</p>
                    <p class="price">288 <span class="currency" data-currency="$">$</span> </p>
                    <a href="item.html" class="buyBtn">
                        Գնել
                        <img src="{{asset('img/card.png')}}" alt="card">
                    </a>
                </div>
                <div class="car_section_item hover">
                    <div class="car_section_item_cover">
                        <div class="follow">
                            <p>Ավելացնել նախընտրածների մեջ</p>
                            <a href="#">
                                <img src="{{asset('img/follow.png')}}" alt="follow">
                            </a>
                        </div>
                        <img src="{{asset('img/bmw.jpg')}}" alt="bmw">
                    </div>
                    <h3><a href="item.html">BMW X6</a></h3>
                    <p>Վազքը՝ 233 կմ/ժ</p>
                    <p class="price">288 <span class="currency" data-currency="$">$</span> </p>
                    <a href="item.html" class="buyBtn">
                        Գնել
                        <img src="{{asset('img/card.png')}}" alt="card">
                    </a>
                </div>
                <p class="seeMore"><a href="#">Տեսնել ավելին</a></p>
        </section>

        <section class="car_section container">
                <h1 class="section_title">TOYOTA</h1>
                <div class="car_section_item hover">
                    <div class="car_section_item_cover">
                        <div class="follow">
                            <p>Ավելացնել նախընտրածների մեջ</p>
                            <a href="#">
                                <img src="{{asset('img/follow.png')}}" alt="follow">
                            </a>
                        </div>
                        <img src="{{asset('img/bmw.jpg')}}" alt="bmw">
                    </div>
                    <h3><a href="item.html">BMW X6</a></h3>
                    <p>Վազքը՝ 233 կմ/ժ</p>
                    <p class="price">288 <span class="currency" data-currency="$">$</span> </p>
                    <a href="item.html" class="buyBtn">
                        Գնել
                        <img src="{{asset('img/card.png')}}" alt="card">
                    </a>
                </div>
                <div class="car_section_item hover">
                    <div class="car_section_item_cover">
                        <div class="follow">
                            <p>Ավելացնել նախընտրածների մեջ</p>
                            <a href="#">
                                <img src="{{asset('img/follow.png')}}" alt="follow">
                            </a>
                        </div>
                        <img src="{{asset('img/bmw.jpg')}}" alt="bmw">
                    </div>
                    <h3><a href="item.html">BMW X6</a></h3>
                    <p>Վազքը՝ 233 կմ/ժ</p>
                    <p class="price">288 <span class="currency" data-currency="$">$</span> </p>
                    <a href="item.html" class="buyBtn">
                        Գնել
                        <img src="{{asset('img/card.png')}}" alt="card">
                    </a>
                </div>
                <div class="car_section_item hover">
                    <div class="car_section_item_cover">
                        <div class="follow">
                            <p>Ավելացնել նախընտրածների մեջ</p>
                            <a href="#">
                                <img src="{{asset('img/follow.png')}}" alt="follow">
                            </a>
                        </div>
                        <img src="{{asset('img/bmw.jpg')}}" alt="bmw">
                    </div>
                    <h3><a href="item.html">BMW X6</a></h3>
                    <p>Վազքը՝ 233 կմ/ժ</p>
                    <p class="price">288 <span class="currency" data-currency="$">$</span> </p>
                    <a href="item.html" class="buyBtn">
                        Գնել
                        <img src="{{asset('img/card.png')}}" alt="card">
                    </a>
                </div>
                <div class="car_section_item hover">
                    <div class="car_section_item_cover">
                        <div class="follow">
                            <p>Ավելացնել նախընտրածների մեջ</p>
                            <a href="#">
                                <img src="{{asset('img/follow.png')}}" alt="follow">
                            </a>
                        </div>
                        <img src="{{asset('img/bmw.jpg')}}" alt="bmw">
                    </div>
                    <h3><a href="item.html">BMW X6</a></h3>
                    <p>Վազքը՝ 233 կմ/ժ</p>
                    <p class="price">288 <span class="currency" data-currency="$">$</span> </p>
                    <a href="item.html" class="buyBtn">
                        Գնել
                        <img src="{{asset('img/card.png')}}" alt="card">
                    </a>
                </div>
                <div class="car_section_item hover">
                    <div class="car_section_item_cover">
                        <div class="follow">
                            <p>Ավելացնել նախընտրածների մեջ</p>
                            <a href="#">
                                <img src="{{asset('img/follow.png')}}" alt="follow">
                            </a>
                        </div>
                        <img src="{{asset('img/bmw.jpg')}}" alt="bmw">
                    </div>
                    <h3><a href="item.html">BMW X6</a></h3>
                    <p>Վազքը՝ 233 կմ/ժ</p>
                    <p class="price">288 <span class="currency" data-currency="$">$</span> </p>
                    <a href="item.html" class="buyBtn">
                        Գնել
                        <img src="{{asset('img/card.png')}}" alt="card">
                    </a>
                </div>
                <div class="car_section_item hover">
                    <div class="car_section_item_cover">
                        <div class="follow">
                            <p>Ավելացնել նախընտրածների մեջ</p>
                            <a href="#">
                                <img src="{{asset('img/follow.png')}}" alt="follow">
                            </a>
                        </div>
                        <img src="{{asset('img/bmw.jpg')}}" alt="bmw">
                    </div>
                    <h3><a href="item.html">BMW X6</a></h3>
                    <p>Վազքը՝ 233 կմ/ժ</p>
                    <p class="price">288 <span class="currency" data-currency="$">$</span> </p>
                    <a href="item.html" class="buyBtn">
                        Գնել
                        <img src="{{asset('img/card.png')}}" alt="card">
                    </a>
                </div>
                <div class="car_section_item hover">
                    <div class="car_section_item_cover">
                        <div class="follow">
                            <p>Ավելացնել նախընտրածների մեջ</p>
                            <a href="#">
                                <img src="{{asset('img/follow.png')}}" alt="follow">
                            </a>
                        </div>
                        <img src="{{asset('img/bmw.jpg')}}" alt="bmw">
                    </div>
                    <h3><a href="item.html">BMW X6</a></h3>
                    <p>Վազքը՝ 233 կմ/ժ</p>
                    <p class="price">288 <span class="currency" data-currency="$">$</span> </p>
                    <a href="item.html" class="buyBtn">
                        Գնել
                        <img src="{{asset('img/card.png')}}" alt="card">
                    </a>
                </div>
                <div class="car_section_item hover">
                    <div class="car_section_item_cover">
                        <div class="follow">
                            <p>Ավելացնել նախընտրածների մեջ</p>
                            <a href="#">
                                <img src="{{asset('img/follow.png')}}" alt="follow">
                            </a>
                        </div>
                        <img src="{{asset('img/bmw.jpg')}}" alt="bmw">
                    </div>
                    <h3><a href="item.html">BMW X6</a></h3>
                    <p>Վազքը՝ 233 կմ/ժ</p>
                    <p class="price">288 <span class="currency" data-currency="$">$</span> </p>
                    <a href="item.html" class="buyBtn">
                        Գնել
                        <img src="{{asset('img/card.png')}}" alt="card">
                    </a>
                </div>
                <p class="seeMore"><a href="#">Տեսնել ավելին</a></p>
            </section>
    </section>
</main>

@endsection