{{--STEP詳細画面のデータ部分のビュー--}}
<div class="p-article-detail">

    <h2 class="p-article-detail__title">{{$article->title}}</h2>

    <div class="p-postdata__profile-area l-flexbox">

        <!-- 投稿者の画像と名前全体をリンクにする -->
        @if(empty($article->user))

        @else
            @auth
                <a href="@if($userAuth->id === $article->user->id){{route('mypage.learn')}}@else{{route('userProfile.learn', $article->user->id)}}@endif" class="p-article-detail__profile-link p-postdata__profile-link"></a>
            @else
                <a href="{{route('userProfile.learn', $article->user->id)}}" class="p-article-detail__profile-link p-postdata__profile-link"></a>
            @endauth
        @endif

        <div class="p-postdata__avatar-area">
            <img src="@if(empty($article->user->user_img)){{asset('img/blank-profile.png')}}@else{{$article->user->user_img}}@endif"
                 alt="投稿者の画像" class="c-avatar">
        </div>
        <p class="p-postdata__name">
            @if(empty($article->user->name))
                削除済みユーザー
            @else
                {{$article->user->name}}
            @endif
        </p>

        <p class="p-postdata__post-date">
            {{$article->updated_at->format('Y/m/d')}}
        </p>

    </div>

    <div class="p-article-detail__top">

        <div class="p-article-detail__eyecatch-area">
            <div class="p-article-detail__category-area">
                @forelse($article->categories as $category)
                    <span class="c-badge">{{ $category->name }}</span>
                @empty
                    <p>
                        <span class="c-badge">カテゴリー未登録</span>
                    </p>
                @endforelse
            </div>

            <img src="@if(empty($article->article_img)){{asset('img/no_img_article.jpg')}}
            @else{{$article->article_img}}@endif" class="p-article-detail__eyecatch c-eyecatch" alt="STEPの画像">
        </div>

        <div class="p-article-detail__right ">

            <div class="p-article-detail__icon-area l-flexbox">
                <div>
                    <a href="http://twitter.com/intent/tweet?url={{url("articles/detail/{$article->id}")}}&text=「{{$article->title}}」に挑戦中！！&hashtags=WebTips" title="Twitterでつぶやく">
                        <i class="fab fa-twitter c-icon--twitter"></i>
                    </a>
                </div>

                <learnbtn
                :article="{{json_encode($article)}}"
                :article-id="{{json_encode($article->id)}}"
                :learn-count="{{json_encode(count($article->learns))}}"
                :login-route="{{json_encode(route('login'))}}"
                @if(!empty($userAuth))
                    :user-auth="{{json_encode($userAuth)}}"
                    :default-learn="{{json_encode($article->learns->where('user_id', $userAuth->id)->first())}}"
                @endif

                ></learnbtn>

            </div>

            <div class="p-article-detail__description-area">
                <p>
                    {!! nl2br(e($article->description)) !!}
                </p>
            </div>

        </div>

    </div>

</div>


