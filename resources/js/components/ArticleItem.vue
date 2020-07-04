<template>
    <div class="p-step-panel c-panel">

        <!-- パネル全体をリンクにする -->
        <a v-bind:href="articleRoute" class="p-step-panel__link-large" title="記事ページ"></a>

        <div class="p-step-panel__stepImg-area">
            <img v-bind:src="uploadedImage" class="p-step-panel__stepImg" alt="記事の画像">
        </div>

        <div class="p-step-panel__contents">

            <div class="p-step-panel__title-area l-flexbox">
                <h3 class="p-step-panel__title">{{limitTitle}}</h3>
            </div>

            <div class="p-step-panel__item">
                <span v-if="articleCategories.length === 0" class="p-step-panel__category c-badge">
                    カテゴリー未登録
                </span>
                <span v-else v-for="category in articleCategories" class="p-step-panel__category c-badge">
                    {{ category.name }}
                </span>
            </div>

            <div class="p-step-panel__item">
                <p v-if="chapters" class="u-text-gray-500">
                    全{{chapters.length}}項目
                </p>
            </div>

            <div class="p-step-panel__bottom l-flexbox">

                <div class="p-step-panel__twitter-area">
                    <a :href="'http://twitter.com/intent/tweet?url='+ articleUrl +'&text=「'+ article.title +'」を学習中！！&hashtags=WebTips'" title="Twitterでつぶやく">
                        <i class="fab fa-twitter c-icon--twitter "></i>
                    </a>
                </div>

                <div v-bind:class="{'u-text-red': defaultLearn, 'u-text-gray-500': !defaultLearn, ' p-step-panel__myStep-challenge-area': postRouteFlag }" class="l-flexbox">
                    <span class="u-mr-xs">
                        <i class="fas fa-book-open"></i>
                    </span>
                    <span>{{learnCount}}人が学習中</span>
                </div>

                <form v-if="postRouteFlag" :action="editRoute" method="POST" class="p-step-panel__deleteForm">
                    <input type="hidden" name="_token" :value="csrf">
                    <button onclick="return confirm('本当にこのSTEPを削除してよろしいですか？');"
                            class="c-btn c-btn--red c-btn--mystep p-step-panel__delete">
                        {{deleteLink}}
                    </button>
                </form>
                <a v-if="postRouteFlag" class="c-btn c-btn--blue c-btn--mystep" :href="editRoute" title="記事編集ページ">{{editLink}}</a>

            </div>
        </div>
    </div>
</template>

<script>
    export default {
        props: ['article', 'chapters', 'articleCategories', 'articleUser', 'userAuth', 'learnCount', 'articleLearns', 'defaultLearn','articleRoute', 'articleUrl','limitTitle','postRouteFlag','editRoute','editLink','deleteLink'],
        data() {
            return {
                uploadedImage: this.article.article_img ? this.article.article_img:'/img/no_img_article.jpg',
                date: this.$moment().format(),
                csrf: document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
            };
        },
    }
</script>

