<section class="p-step-introduction l-bg-gray-top">
    <div class="l-container">
        <h2 class="c-title--container">STEP一覧</h2>
        <div class="p-step-list">
            <div class="p-steps l-flexbox">

                @forelse($articles as $article)

                    <step
                        :step="{{json_encode($article)}}"
                        :child-steps="{{json_encode($article->chapters)}}"
                        :step-categories="{{json_encode($article->categories)}}"
                        :challenge-count="{{json_encode(count($article->learns))}}"
                        :step-challenges="{{json_encode($article->user->learns)}}"
                        :step-user="{{json_encode($article->user)}}"
                        :step-route="{{json_encode(route('articles.show', $article->id))}}"
                        :limit-title="{{json_encode(Str::limit($article->title,53))}}"
                        @if(!empty($userAuth))
                            :user-auth="{{json_encode($userAuth)}}"
                            :default-challenge="{{json_encode($article->learns->where('user_id', $userAuth->id)->first())}}"
                        @endif
                    ></step>

                @empty

                    <div class="c-guide-msg">
                        <p class="c-guide-msg__text">投稿されたSTEPがありません。</p>
                        <p class="c-guide-msg__text">あなたの知識や経験をシェアしませんか？</p>
                        <a class="c-btn--yellow c-guide-msg__link" href="{{ route('articles.new') }}">{{ __('POST Now') }}</a>
                    </div>

                @endforelse
            </div>
        </div>

        <a href="{{ route('articles.list') }}" class="c-btn--blue c-btn--allSteps">{{ __('Show All Articles') }}</a>

    </div>
</section>
