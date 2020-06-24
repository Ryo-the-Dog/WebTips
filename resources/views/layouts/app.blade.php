{{-- 全体のレイアウトのビュー --}}
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="STEP(ステップ)は目標達成までの過程をシェアできる学習サービスです。">

    <!-- Twitter -->
    <meta property="og:url" content="{{ url('/') }}">
    <meta property="og:title" content="STEP" >
    <meta property="og:description" content="STEP(ステップ)は目標達成までの過程をシェアできる学習サービスです。" >
    <meta property="og:image" content="{{ asset('/img/twitter_card.jpg') }}" >
    <meta name="twitter:card" content="summary">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    @hasSection('title')
        <title>@yield('title') | {{ config('app.name', 'STEP') }}</title>
    @else
        <title>{{ config('app.name', 'STEP') }}</title>
    @endif

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <!-- Chromeでページ読み込み時にtransitionが発火してしまうのを防ぐ -->
    <script>console.log</script>
    <!-- favicon -->
    <link rel="shortcut icon" href="{{ asset('/img/favicon.ico') }}">
    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
</head>

<body class="l-body l-flexbox">
    <div id="app" class="l-wrapper l-flexbox">

        <!-- ヘッダー -->
        <header id="header" class="l-header p-header
                @if(Route::currentRouteName() === 'index') fixed @elseif(Route::currentRouteName() === 'steps.list') category-fixed @endif">

            <div class="p-header__top">
                <div class="p-header__container l-flexbox">

                    <!-- サイトロゴ -->
                    <h1 class="c-site-logo">
                        <a href="@guest{{ route('index') }}@else{{ route('steps.list') }} @endguest"
                           class="c-site-logo__link" title="@guest トップページ @else STEP一覧 @endguest">
                            <img src="{{asset('/img/step_icon_top.png')}}" alt="STEP" class="c-site-logo__img">
                        </a>
                    </h1>

                    <!-- 検索欄 -->
                    @if(Route::currentRouteName()==='steps.list' || Route::currentRouteName()==='steps.search')
                        <Searchform
                            :action-route="{{json_encode(route('steps.search'))}}"
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
                            :mypage-route="{{json_encode(route('mypage.challenge'))}}"
                            :logout-route="{{json_encode(route('logout'))}}"
                            :post-route="{{json_encode(route('steps.new'))}}"
                            :mypage-link="{{json_encode(__('Mypage'))}}"
                            :logout-link="{{json_encode(__('Logout'))}}"
                            :post-link="{{json_encode(__('STEP POST'))}}"
                        @endguest
                    ></HamburgerMenu>

                </div>
            </div>

            <!-- カテゴリーヘッダー -->
            @if( Route::currentRouteName() === 'steps.list' )

                @include('partials.categoryHeader')

            <!-- マイページのプロフィール部分 -->
            @elseif( explode('.', Route::currentRouteName())[0] == 'mypage' )

                @include('partials.profData')

            <!-- ユーザーのプロフィール部分 -->
            @elseif( explode('.', Route::currentRouteName())[0] == 'userProfile' )

                @include('partials.userProfData')

            @endif
        </header>

        <!-- フラッシュメッセージ -->
        @if (session('flash_message'))
            @php $flashMessage = session('flash_message'); @endphp
            <flashmessage
            :flash-message="{{json_encode($flashMessage)}}"
            ></flashmessage>
        @endif

        <!-- メイン部分 -->
        <main class="l-main @if(Route::currentRouteName() === 'index') fixed @elseif(Route::currentRouteName() === 'steps.list') category-fixed @endif">
            @yield('content')
        </main>

        <!-- フッター -->
        <footer class="l-footer">
            <div class="p-footer">
                <p class="u-text-muted">Copyright &copy;TechStep All Rights Reserved.</p>
            </div>
        </footer>
    </div>
</body>
</html>
