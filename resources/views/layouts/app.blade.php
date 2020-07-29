{{-- 全体のレイアウトのビュー --}}
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="WebTips(ウェブティップス)は、web開発のための情報をシェアすることでエンジニアをサポートする学習サービスです。">

    <!-- Twitter -->
    <meta property="og:url" content="{{ url('/') }}">
    <meta property="og:title" content="WebTips" >
    <meta property="og:description" content="WebTips(ウェブティップス)は、web開発のための情報をシェアすることでエンジニアをサポートする学習サービスです。" >
    <meta property="og:image" content="{{ asset('/img/twitter_card.jpg') }}" >
    <meta name="twitter:card" content="summary_large_image">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    @hasSection('title')
        <title>@yield('title') | {{ config('app.name', 'WebTips') }}</title>
    @else
        <title>{{ config('app.name', 'WebTips') }}</title>
    @endif

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/github-markdown-css/3.0.1/github-markdown.min.css">

    <!-- Chromeでページ読み込み時にtransitionが発火してしまうのを防ぐ -->
    <script>console.log</script>
    <!-- favicon -->
    <link rel="shortcut icon" href="{{ asset('/img/favicon.ico') }}">
    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    @gitdown
</head>

<body class="l-body l-flexbox">
    <div id="app" class="l-wrapper l-flexbox">

        <!-- ヘッダー -->
        <header id="header" class="l-header p-header
                @if(Route::currentRouteName() === 'index') fixed @elseif(Route::currentRouteName() === 'articles.list') category-fixed @endif">

            @include('partials.commonHeader')

        </header>

        <!-- フラッシュメッセージ -->
        @if (session('flash_message'))
            <flashmessage
            :flash-message="{{json_encode(session('flash_message'))}}"
            ></flashmessage>
        @endif

        <!-- メイン部分 -->
        <main class="l-main @if(Route::currentRouteName() === 'index') fixed @elseif(Route::currentRouteName() === 'articles.list') category-fixed @endif">
            @yield('content')
        </main>

        <!-- フッター -->
        <footer class="l-footer">
            <div class="p-footer">
                <p class="u-text-muted">Copyright &copy;WebTips All Rights Reserved.</p>
            </div>
        </footer>
    </div>
</body>
</html>
