<section class="p-article-introduction l-bg-gray-top">
    <div class="l-container">
        <h2 class="c-title--container">記事一覧</h2>
            <div class="p-articles l-flexbox">

                @forelse($articles as $article)

                    <articleitem
                        :article="{{json_encode($article)}}"
                        :article-user="{{json_encode($article->user)}}"
                        :chapters="{{json_encode($article->chapters)}}"
                        :article-categories="{{json_encode($article->categories)}}"
                        :learn-count="{{json_encode(count($article->learns))}}"
                        :article-learns="{{json_encode($article->user->learns)}}"
                        :article-route="{{json_encode(route('articles.show', $article->id))}}"
                        :userprofile-route="{{json_encode(route('userProfile.learn', $article->user->id))}}"
                        :mypage-route="{{json_encode(route('mypage.learn'))}}"
                        :article-url="{{json_encode(url("articles/detail/{$article->id}"))}}"
                        :limit-title="{{json_encode(Str::limit($article->title,53))}}"
                        @if(!empty($userAuth))
                        :user-auth="{{json_encode($userAuth)}}"
                        :default-learn="{{json_encode($article->learns->where('user_id', $userAuth->id)->first())}}"
                        @endif
                    ></articleitem>

                @empty

                    <div class="c-guide-msg">
                        <p class="c-guide-msg__text">投稿された記事がありません。</p>
                        <p class="c-guide-msg__text">あなたの知識や経験をシェアしませんか？</p>
                        <a class="c-btn--yellow c-guide-msg__link" href="{{ route('articles.new') }}">{{ __('POST Now') }}</a>
                    </div>

                @endforelse
            </div>

        <a href="{{ route('articles.list') }}" class="c-btn--blue c-btn--allSteps">{{ __('Show All Articles') }}</a>

    </div>
</section>
