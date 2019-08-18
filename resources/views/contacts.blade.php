@extends('layouts.index')

@section('content')
@include('includes/slider')
<style>
    .modal .modal_item{
        padding: 10px 15px;
    }
    .modal .modal_item form input{
        padding: 10px 15px;
    }
</style>

<main>
    <div class="btn-up"><i class="fa fa-chevron-up"></i></div>
    <section class="contact container">
        <section class="contactMethods">
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
            <div class="contact_social">
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
            </div>
        </section>
        <section class="contactMap">
            <div class="iframe_wrap">
                <iframe src="https://yandex.ru/map-widget/v1/-/CCrdEMya" width="560" height="400" frameborder="0" allowfullscreen="true"></iframe>
            </div>
        </section>
    </section>
</main>

@endsection