{{-- ユーザープロフィールページのプロフィール部分のビュー --}}
<div class="p-header__bottom">
    <div class="p-header__container">
        <div class="p-profile">
            <h2 class="p-profile__title">{{$userProf->name}}のプロフィールページ</h2>

            <div class="p-profile__userDara l-flexbox">
                <div class="p-profile__img-area">
                    <img src="@if(empty($userProf->user_img)){{asset('/img/blank-profile.png')}}
                    @else{{$userProf->user_img}}@endif" class="p-profile__img c-avatar" alt="プロフィール画像">
                </div>
                <div class="p-profile__introduce-area">
                    <h3 class="p-profile__title">紹介文</h3>
                    <p class="p-profile__introduce">
                        @if(!empty($userProf->introduce))
                            {!! nl2br(e($userProf->introduce)) !!}
                        @else
                            紹介文はありません。
                        @endif
                    </p>
                </div>
            </div>
        </div>

        <nav class="c-navbar">
            <ul class="c-navbar-bottom l-flexbox">
                <li class="c-navbar-bottom__item @if(Route::currentRouteName() === 'userProfile.learn') active @endif">
                    <a href="{{route('userProfile.learn', $userProf->id)}}" class="c-navbar-bottom__link">{{__('Learn List')}}</a>
                </li>
                <li class="c-navbar-bottom__item @if(Route::currentRouteName() === 'userProfile.clear') active @endif">
                    <a href="{{route('userProfile.clear', $userProf->id)}}" class="c-navbar-bottom__link">{{__('Clear List')}}</a>
                </li>
                <li class="c-navbar-bottom__item @if(Route::currentRouteName() === 'userProfile.post' || explode('.', Route::currentRouteName())[1] == 'mystepEdit') active @endif">
                    <a href="{{route('userProfile.post', $userProf->id)}}" class="c-navbar-bottom__link">{{__('Posted Articles')}}</a>
                </li>
            </ul>
        </nav>

    </div>
</div>
