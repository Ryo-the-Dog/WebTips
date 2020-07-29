{{-- ヘッダーのカテゴリー部分のビュー --}}

<div class="p-header__bottom">
    <div class="p-header__container">

        <nav class="c-navbar l-flexbox">

            <ul class="c-navbar-bottom category l-flexbox">
                <li class="c-navbar-bottom__item @if(Route::currentRouteName() === 'articles.list' && empty($categoryId)) active @endif">
                    <a href="{{route('articles.list', ['sort_id' => $sortId])}}" class="c-navbar-bottom__link">全て</a>
                </li>
                @forelse($categoryList as $category)
                    <li class="c-navbar-bottom__item @if($categoryId == $category->id) active @endif">
                        <a href="{{ route('articles.list', ['category_id' => $category->id, 'sort_id' => $sortId]) }}" class="c-navbar-bottom__link">{{$category->name}}</a>
                    </li>
                @empty

                @endforelse
            </ul>

            <Sortdropdown
                :asc-route="{{json_encode(route('articles.list', [ 'category_id' => $categoryId, 'sort_id' => 'asc' ]))}}"
                :desc-route="{{json_encode(route('articles.list', ['category_id' => $categoryId, 'sort_id' => 'desc']))}}"
                :popular-route="{{json_encode(route('articles.list', ['category_id' => $categoryId, 'sort_id' => 'popular']))}}"
                :sort-id="{{json_encode($sortId)}}"

                @if($sortId === 'popular')
                    :popular-flg="{{json_encode(true)}}"
                @elseif($sortId === 'asc')
                    :asc-flg="{{json_encode(true)}}"
                @elseif($sortId === 'desc' || $sortId !== 'asc')
                    :desc-flg="{{json_encode(true)}}"
                @endif

            ></Sortdropdown>
        </nav>

    </div>
</div>
