<nav>
    <section class="nav container">
        <div class="logo">

            <h1><a href="{{ route('index',app()->getLocale())}}">
              <img src="{{ asset('img/logo1.png') }}" style="width: 120px;">
            </a></h1>
        </div>
        <div class="menu-btn">
            <div class="menu-btn">
                <span></span>
            </div>
        </div>
        <ul class="nav_menu">
            @if (!Route::is('home') && !Route::is('home.statement') && !Route::is('home.settings.edit') && !Route::is('home.statement.edit'))
            <li><a href="{{ route('index',app()->getLocale())}}">Գլխավոր</a></li>
            
            {{-- <li><a href="{{route('all_cars', app()->getLocale())}}">Մեքենաներ</a></li> --}}

            <li><a href="{{ route('about',app()->getLocale())}}">Մեր մասին</a></li>
            <!-- <li><a href="rent_car.html">Վարձակալություն</a></li> -->
            <li><a href="{{route('contacts',app()->getLocale())}}">Կապ</a></li>
            @else
            {{-- <li><a href="{{ route('home.statement',app()->getLocale())}}" class="{{ Route::is('home.statement')?'active':'passive'}}"> --}}
            <li><a href="{{ route('home',app()->getLocale())}}" class="{{ Route::is('home')?'active':'passive'}}">    
                {{__('Statements')}}
            </a></li>
            <li><a href="{{ route('home.settings.edit',app()->getLocale())}}" class="{{ Route::is('home.settings.edit')?'active':'passive'}}">
                {{__('Settings')}}
            </a></li>
            @endif
        </ul>
        <div class="login_block">
            @guest
            <a href="#" class="log_open mobileLog"></a>
            <a href="#" class="reg_open mobileReg"></a>
                        
            <a href="#" class="log_open">{{ __('Login') }}</a>
            <a class="reg_open2" href="{{ route('register', app()->getLocale()) }}">{{ __('Register') }}</a>
            {{-- <a href="#" class="reg_open">Գրանցում</a> --}}

            @else
                @if (Route::is('home') || Route::is('home.statement') || Route::is('home.settings.edit') || Route::is('home.statement.edit'))

                <img src="{{ asset('img/tachometer.png')}}" alt="tachometer.png" class="notify-user-img">
                <a href="{{ route('home', app()->getLocale()) }}" class="">
                    {{ Auth::user()->name }}</a>
                <a href="{{ route('logout', app()->getLocale()) }}" class="log_close"
                    onclick="event.preventDefault(); document.getElementById('logout-form').submit();">                
                    <img src="{{ asset('img/logout.png')}}" alt="logout.png" style="width:25px">
                    {{ __('Logout') }}
                </a>
                @else
                    
                <a href="{{ route('home', app()->getLocale()) }}">{{ Auth::user()->name }}</a>
                <a href="{{ route('logout', app()->getLocale()) }}" class="log_close"
                    onclick="event.preventDefault(); document.getElementById('logout-form').submit();">                
                    <img src="{{ asset('img/logout.png')}}" alt="logout.png" style="width:15px">
                    {{ __('Logout') }}
                </a>
                @endif
            
                <form id="logout-form" action="{{ route('logout', app()->getLocale()) }}" method="POST" style="display: none;">
                    @csrf
                </form>
            @endguest
        </div>
        <div class="languages">
            
            @if (Route::is('home.statement.edit'))
                @foreach (config('app.available_locales') as $locale)            
                <a class="lang"
                href="{{ route(\Illuminate\Support\Facades\Route::currentRouteName(), ['locale'=>$locale,'st_id'=>$st_id]) }}"
                {{-- href="{{url()->full()}}" --}}
                    @if (app()->getLocale() == $locale) style="filter: brightness(1.5);" @endif>
                        <img src="{{ asset('img/'.config('app.al_data')[$locale]['img'].'.png') }}"
                            alt="{{config('app.al_data')[$locale]['img']}}" 
                            @if (app()->getLocale() == $locale) style="box-shadow: -2px -4px 3px -2px;" @endif>
                </a>            
                @endforeach
            @else
                @foreach (config('app.available_locales') as $locale)            
                <a class="lang"
                href="{{ route(\Illuminate\Support\Facades\Route::currentRouteName(), $locale) }}"
                {{-- href="{{url()->full()}}" --}}
                    @if (app()->getLocale() == $locale) style="filter: brightness(1.5);" @endif>
                        <img src="{{ asset('img/'.config('app.al_data')[$locale]['img'].'.png') }}"
                            alt="{{config('app.al_data')[$locale]['img']}}" 
                            @if (app()->getLocale() == $locale) style="box-shadow: -2px -4px 3px -2px;" @endif>
                </a>            
                @endforeach
            @endif
            {{-- @foreach (config('app.available_locales') as $locale)            
            <a class="lang"
            href="{{ route(\Illuminate\Support\Facades\Route::currentRouteName(), ['locale'=>$locale,'st_id'=>$st_id]) }}"
            
                @if (app()->getLocale() == $locale) style="filter: brightness(1.5);" @endif>
                    <img src="{{ asset('img/'.config('app.al_data')[$locale]['img'].'.png') }}"
                        alt="{{config('app.al_data')[$locale]['img']}}" 
                        @if (app()->getLocale() == $locale) style="box-shadow: -2px -4px 3px -2px;" @endif>
            </a>            
            @endforeach --}}
            {{-- <a href="{{url("/am")}}" class="lang" title="Հայերեն">
                <img src="{{ asset('img/ARM.png') }}" alt="arm">
            </a>
            <a href="{{url("/ru")}}" class="lang" title="Русский">
                <img src="{{ asset('img/RUS.png') }}" alt="rus">
            </a>
            <a href="{{url("/en")}}" class="lang" title="English">
                <img src="{{ asset('img/ENG.png') }}" alt="eng">
            </a> --}}
        </div>
    </section>
</nav>
<!-- reg_login modals -->
<div class="modal mod1">
    <div class="modal_item">
        <div class="form_top">
            <h3> <img src="{{ asset('img/locked.png') }}" alt="lock"> Մուտք</h3>
            <div class="close_modal">
                <img src="{{ asset('img/close.png') }}" alt="close" title="Փակել">
            </div>
        </div>

        {{-- <form name="login">
            <input type="text" placeholder="Մուտքանուն կամ էլ. հասցե">
            <input type="password" placeholder="Գաղտնաբառ">
            <button class="loginBtn">Մուտք</button>
            <a href="recover_profile.html">Վերականգնել հաշիվը</a>
        </form> --}}
        <form method="POST" action="{{ route('login', app()->getLocale()) }}" name="login" onsubmit="loginUser(event)">
            @csrf
            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus placeholder="{{ __('E-Mail Address')}}">
            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password" placeholder="{{ __('Password')}}">
            <input type="hidden" name="app_url" value="{{ config('app.url') }}">
            <span class="invalid-feedback" id="loginErrorMsg">{{ __('auth.failed') }}</span>
            {{-- <a href="recover_profile.html">Վերականգնել հաշիվը</a> --}}
            <button type="submit" class="loginBtn">
                {{ __('Login') }}
            </button>
            @if (Route::has('password.request'))
                <a class="btn btn-link" href="{{ route('password.request', app()->getLocale()) }}">
                    {{ __('Forgot Your Password?') }}
                </a>
            @endif
        </form>
    </div>
</div>
<div class="modal mod2">
    <div class="modal_item">
        <div class="form_top">
            <h3> <img src="{{ asset('img/regicon.png') }}" alt="reg"> Գրանցում </h3>
            <div class="close_modal">
                <img src="{{ asset('img/close.png') }}" alt="close" title="Փակել">
            </div>
        </div>
        <p class="reg_info">
            Գրանցվելու համար պարտադիր է լրացնել բոլոր առկա դաշտերը: Հարցերի դեպքում կարող եք կապվել մեր <a href="#">մասնագետների հետ</a>: Ձեր լրացրած տվյալները ապահովագրված են ցանկացած իրավիճակում:
        </p>
        <form name="login_djvar_login">
            <p>Գրեք այն մուտքանունը որով ցանկանում եք մուտք գործել</p>
            <input type="text" placeholder="Մուտքանուն">
            <p>Գրեք Ձեր իրական անուն և ազգանունը, որը անձնագրում է</p>
            <input type="text" placeholder="Անուն">
            <input type="text" placeholder="Ազգանուն">
            <p>Գրեք այն հեռախոսահամարը, որը պատկանում է ձեզ, և ակտիվ է</p>
            <input type="text" placeholder="Հեռախոսահամար">
            <p>Գրեք այն էլ. հասցեն, որը պատկանում է ձեզ, և ակտիվ է</p>
            <input type="mail" placeholder="Էլ. հասցե">
            <p>Գաղտնաբառը պետք է լինի միայն լատինատառ և իր մեջ պարունակի մինիմում մեկ մեծատառ և մեկ թիվ</p>
            <input type="password" placeholder="Գաղտնաբառ">
            <input type="password" placeholder="Կրկնել գաղտնաբառը">
            <button class="regBtn">Գրանցում</button>
            <a href="recover_profile.html">Վերականգնել հաշիվը</a>
        </form>
    </div>
</div>
<!-- reg_login modals end -->
