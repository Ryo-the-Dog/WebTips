{{--トップページのヒーロー画像のビュー--}}
<section class="p-hero" id="top">
    <div class="p-hero__area l-container l-flexbox">

        <h2 class="p-hero__title">プログラミングのステップをシェアしよう</h2>

        <p class="p-hero__text u-text-white">
            TECH-STEPはプログラミングの環境構築や<br/>
            サービス開発の過程などをシェアすることで<br/>
            エンジニアをサポートするサービスです
        </p>

        <button>
            <a href="{{ route('register') }}" class="c-btn c-btn--yellow p-hero__register" title="会員登録ページ">{{ __('Try Registering') }}</a>
        </button>

        <a href="{{ route('steps.list') }}" class="p-hero__link" title="STEP一覧">会員登録しない場合はコチラから</a>

    </div>
</section>
