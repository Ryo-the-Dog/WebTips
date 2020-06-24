{{-- マイページのプロフィール部分 --}}
<div class="p-header__bottom">
    <div class="p-header__container">

        <div class="p-profile l-flexbox">

            <div class="p-profile__img-area">
                <img src="@if(empty($userAuth->user_img)){{asset('/img/blank-profile.png')}}
                @else{{$userAuth->user_img}}@endif" class="p-profile__img c-avatar" alt="プロフィール画像">
            </div>

            <div class="p-profile__item">
                <span class="p-profile__name">{{$userAuth->name}}</span><span>のマイページ</span>
            </div>

        </div>

        <nav class="c-navbar">
            <ul class="c-navbar-bottom l-flexbox">
                <li class="c-navbar-bottom__item @if(Route::currentRouteName() == 'mypage.challenge') active @endif">
                    <a href="{{route('mypage.challenge')}}" class="c-navbar-bottom__link">{{__('Challenged STEP')}}</a>
                </li>
                <li class="c-navbar-bottom__item @if(Route::currentRouteName() == 'mypage.mystep' || explode('.', Route::currentRouteName())[1] == 'mystepEdit') active @endif">
                    <a href="{{route('mypage.mystep')}}" class="c-navbar-bottom__link">{{__('Posted STEP')}}</a>
                </li>
                <li class="c-navbar-bottom__item @if(Route::currentRouteName() == 'mypage.profEdit') active @endif">
                    <a href="{{route('mypage.profEdit')}}" class="c-navbar-bottom__link">{{__('Edit Profile')}}</a>
                </li>
                <li class="c-navbar-bottom__item @if(Route::currentRouteName() == 'mypage.passEdit') active @endif">
                    <a href="{{route('mypage.passEdit')}}" class="c-navbar-bottom__link">{{__('Edit Password')}}</a>
                </li>
                <li class="c-navbar-bottom__item @if(Route::currentRouteName() == 'mypage.profDelete') active @endif">
                    <a href="{{route('mypage.profDelete')}}" class="c-navbar-bottom__link">{{__('Delete Account')}}</a>
                </li>
            </ul>
        </nav>

    </div>
</div>
