<footer>
    <section class="footer container">
        <div class="footerItem">
            <h4>Ավտոներկրող</h4>
            <div class="footer_logo" style="color: #fff;">
                <img src="{{ asset('img/logo-auto-light.png') }}" style="width: 125px;">
           </div>
        </div>
        <div class="footerItem">
            <h4>Փնտրել ըստ արտադրողի</h4>
            <div class="footer-makers">
                    <a href="{{ route('search',['locale'=>app()->getLocale(),'make_id'=>5])}}/#search_target" class="footer-make-item">
                        <img src="{{ asset('img/makers/audi.png') }}" alt="audi">
                    </a>
                    <a href="{{ route('search',['locale'=>app()->getLocale(),'make_id'=>44])}}/#search_target" class="footer-make-item">
                        <img src="{{ asset('img/makers/merc.png') }}" alt="mercedes">
                    </a>
                    <a href="{{ route('search',['locale'=>app()->getLocale(),'make_id'=>8])}}/#search_target" class="footer-make-item">
                        <img src="{{ asset('img/makers/bmw.png') }}" alt="bmw">
                    </a>
                    <a href="{{ route('search',['locale'=>app()->getLocale(),'make_id'=>37])}}/#search_target" class="footer-make-item">
                        <img src="{{ asset('img/makers/lex.png') }}" alt="lexus">
                    </a>
                    <a href="{{ route('search',['locale'=>app()->getLocale(),'make_id'=>67])}}/#search_target" class="footer-make-item">
                        <img src="{{ asset('img/makers/toy.png') }}" alt="toyota">
                    </a>
                    <a href="{{ route('search',['locale'=>app()->getLocale(),'make_id'=>72])}}/#search_target" class="footer-make-item">
                        <img src="{{ asset('img/makers/opel.png') }}" alt="opel">
                    </a>
                    <a href="{{ route('search',['locale'=>app()->getLocale(),'make_id'=>49])}}/#search_target" class="footer-make-item">
                        <img src="{{ asset('img/makers/niss.png') }}" alt="nissan">
                    </a>
                    <a href="{{ route('search',['locale'=>app()->getLocale(),'make_id'=>22])}}/#search_target" class="footer-make-item">
                        <img src="{{ asset('img/makers/ford.png') }}" alt="ford">
                    </a>
            </div>
        </div>
        
        <div class="footerItem">
            <div class="footer_social">
                <h4>Հետևեք մեզ</h4>
                <a href="#">
                   <img src="{{ asset('img/facebook.png') }}" alt="fb">
                </a>
                <a href="#">
                    <img src="{{ asset('img/instagram.png') }}" alt="ig">
                </a>
                <a href="#">
                    <img src="{{ asset('img/youtube.png') }}" alt="yt">
                </a>
            </div>
        </div>
        <div class="footer_bottom">
            <span>&copy; <span class="web_year">2019</span> Բոլոր իրավունքները պաշտպանված են</span>
        </div>
    </section>
</footer>
