{{-- STEP一覧画面で使用するSTEP単体のパネル --}}
<div class="p-article-panel c-panel">

    <!-- パネル全体をリンクにする -->
    <a href="{{route('articles.show', $article->id)}}" class="p-article-panel__link-large" title="チャレンジページ"></a>

    <div class="p-article-panel__articleImg-area">
        <img src="@if(empty($article->article_img)){{asset('/img/no_img_article.jpg')}}
        @else{{$article->article_img}}@endif" class="p-article-panel__articleImg" alt="STEPの画像">
    </div>

    <!-- STEPパネルの下半分 -->
    <div class="p-article-panel__contents">

        <div class="p-article-panel__title-area l-flexbox">
            <h3 class="p-article-panel__title">{{Str::limit($article->title,53)}}</h3>
        </div>

        <div class="p-article-panel__item p-article-panel__category-area">
            @forelse($article->categories as $category)
                <span class="p-article-panel__category c-badge">{{ $category->name }}</span>
            @empty
                <span class="p-article-panel__category c-badge">カテゴリー未登録</span>
            @endforelse
        </div>

{{--        <div class="p-article-panel__item">--}}
{{--            <p class="u-text-gray-500">--}}
{{--                目安達成時間：{{$article->time}} 時間--}}
{{--            </p>--}}
{{--        </div>--}}

        <div class="p-article-panel__item">
            @if(!empty($article->chapters))
                <p class="u-text-gray-500">
                    全{{count($article->chapters)}}項目
                </p>
            @endif
        </div>

        <div class="p-article-panel__bottom l-flexbox">

            <div class="p-article-panel__twitter-area">
                <a href="http://twitter.com/intent/tweet?url={{url("articles/detail/{$article->id}")}}&text=「{{$article->title}}」に挑戦中！！&hashtags=STEP" title="Twitterでつぶやく">
                    <i class="fab fa-twitter c-icon--twitter"></i>
                </a>
            </div>

            <div class="@if( Route::currentRouteName() === 'mypage.post') p-article-panel__myArticle-learn-area @else u-ml-auto @endif
                 @if(empty($article->learns->where('user_id', Auth::id())->first())) u-text-gray-500 @else u-text-red @endif">
                <i class="fas fa-book-open"></i>
                <span>{{count($article->learns)}}人が学習中</span>
            </div>

            @if(Route::currentRouteName() === 'mypage.post')
                <form action="{{ route('article.delete', $article->id) }}" method="POST" class="p-article-panel__deleteForm">
                    @csrf
                    <button onclick="return confirm('本当にこのSTEPを削除してよろしいですか？');"
                            class="c-btn c-btn--red c-btn--myarticle p-article-panel__delete">
                        {{__('Delete')}}
                    </button>
                </form>
                <a class="c-btn c-btn--blue c-btn--myarticle" href="{{route('mypage.myarticleEdit', $article->id)}}">{{__('Edit')}}</a>
            @endif

        </div>

    </div>

</div>
