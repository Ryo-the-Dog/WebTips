<div class="p-header__top l-flexbox">
    <div class="p-header__container l-flexbox">

        <!-- サイトロゴ -->
        <h1 class="c-site-logo">
            <a href="@guest{{ route('index') }}@else{{ route('articles.list') }} @endguest"
               class="c-site-logo__link" title="@guest トップページ @else 記事一覧 @endguest">
                <img src="{{asset('/img/title_logo.jpg')}}" alt="WebTips" class="c-site-logo__img">
            </a>
        </h1>

        <!-- 検索欄 -->
        @if(Route::currentRouteName()==='articles.list' || Route::currentRouteName()==='articles.search')
            <Searchform
                :action-route="{{json_encode(route('articles.search'))}}"
                @if(!empty($keyword))
                :keyword="{{json_encode($keyword)}}"
                @endif
            ></Searchform>
    @endif

    <!-- ハンバーガーメニュー -->
        <HamburgerMenu
            @guest
            :guest-flg="{{json_encode(true)}}"
            :auth-flg="{{json_encode(false)}}"
            :login-route="{{json_encode(route('login'))}}"
            :register-route="{{json_encode(route('register'))}}"
            :login-link="{{json_encode(__('Login'))}}"
            :register-link="{{json_encode(__('User Register'))}}"
            @else
            :auth-flg="{{json_encode(true)}}"
            :guest-flg="{{json_encode(false)}}"
            :mypage-route="{{json_encode(route('mypage.learn'))}}"
            :logout-route="{{json_encode(route('logout'))}}"
            :post-route="{{json_encode(route('articles.new'))}}"
            :mypage-link="{{json_encode(__('Mypage'))}}"
            :logout-link="{{json_encode(__('Logout'))}}"
            :post-link="{{json_encode(__('POST'))}}"
            @endguest
        ></HamburgerMenu>

    </div>
</div>

<!-- カテゴリーヘッダー -->
@if( Route::currentRouteName() === 'articles.list' )

    @include('partials.categoryHeader')

    <!-- マイページのプロフィール部分 -->
@elseif( explode('.', Route::currentRouteName())[0] == 'mypage' )

    @include('partials.myProfHeader')

    <!-- ユーザーのプロフィール部分 -->
@elseif( explode('.', Route::currentRouteName())[0] == 'userProfile' )

    @include('partials.userProfHeader')

@endif
