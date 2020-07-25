<template>
    <div class="p-article-panel c-panel">

        <!-- パネル全体をリンクにする -->
        <a v-bind:href="articleRoute" class="p-article-panel__link-large" title="記事ページ"></a>

        <div class="p-article-panel__articleImg-area">
            <img v-bind:src="uploadedImage" class="p-article-panel__articleImg" alt="記事の画像">
        </div>

        <div class="p-article-panel__contents">

            <div class="p-article-panel__title-area l-flexbox">
                <h3 class="p-article-panel__title">{{limitTitle}}</h3>
            </div>

            <div class="p-article-panel__item">
                <span v-if="articleCategories.length === 0" class="p-article-panel__category c-badge">
                    カテゴリー未登録
                </span>
                <span v-else v-for="category in articleCategories" class="p-article-panel__category c-badge">
                    {{ category.name }}
                </span>
            </div>

            <div class="p-postdata__profile-area l-flexbox">

                <!-- 投稿者の画像と名前全体をリンクにする -->

                <a v-if="userAuth && userAuth.id === articleUser.id" :href="mypageRoute" class="p-article-detail__profile-link p-postdata__profile-link"></a>

                <a v-else :href="userprofileRoute" class="p-article-detail__profile-link p-postdata__profile-link"></a>

                <div class="p-postdata__avatar-area">
                    <img :src="userImage" alt="投稿者の画像" class="c-avatar">
                </div>
                <p v-if="articleUser" class="p-postdata__name">
                    {{articleUser.name}}
                </p>
                <p v-else class="p-postdata__name">
                    削除済みユーザー
                </p>

                <p class="p-postdata__post-date">
                    {{article.updated_at | moment("YYYY/MM/DD")}}に更新
                </p>

            </div>

            <div class="p-article-panel__bottom l-flexbox">

                <div class="p-article-panel__twitter-area">
                    <a :href="'http://twitter.com/intent/tweet?url='+ articleUrl +'&text=「'+ article.title +'」を学習中！！&hashtags=WebTips'" title="Twitterでつぶやく">
                        <i class="fab fa-twitter c-icon--twitter "></i>
                    </a>
                </div>

                <div v-bind:class="{' p-article-panel__myArticle-learn-area': postRouteFlag }" class="l-flexbox">
                    <span v-if="userAuth" class="c-btn--axios">
                        <span v-if="!learned" @click="learn(article.id)" class="c-btn--addList">
                            <i class="fas fa-folder-plus u-mr-xs"></i>{{learnReCount}}
                        </span>
                        <span v-else @click="unlearn(article.id)" class="c-btn--removeList">
                            <i class="fas fa-folder-minus u-mr-xs"></i>{{learnReCount}}
                        </span>
                    </span>

                    <span v-else class="c-btn--axios">
                        <a :href="loginRoute" class="c-btn--addList">
                            <i class="fas fa-folder-plus u-mr-xs"></i>{{learnReCount}}
                        </a>
                    </span>
                </div>

                <form v-if="postRouteFlag" :action="editRoute" method="POST" class="p-article-panel__deleteForm">
                    <input type="hidden" name="_token" :value="csrf">
                    <button onclick="return confirm('本当にこのSTEPを削除してよろしいですか？');"
                            class="c-btn c-btn--red c-btn--mystep p-article-panel__delete">
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
        props: [
            'article',
            'chapters',
            'articleCategories',
            'articleUser',
            'userAuth',
            'learnCount',
            'articleLearns',
            'defaultLearn',
            'articleRoute',
            'articleUrl',
            'userprofileRoute',
            'mypageRoute',
            'limitTitle',
            'postRouteFlag',
            'editRoute',
            'editLink',
            'deleteLink',
            'loginRoute'
        ],
        data() {
            return {
                uploadedImage: this.article.article_img ? this.article.article_img:'/img/no_img_article.jpg',
                userImage: this.articleUser.user_img ? this.articleUser.user_img:'/img/blank-profile.jpg',
                date: this.$moment().format('Y/m/d'),
                csrf: document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                // axios
                learned: false,
                learnReCount: 0,
            };
        },
        created() {
            this.learned = this.defaultLearn
            this.learnReCount = this.learnCount
        },
        methods: {
            learn(articleId) {
                const url = `/api/articles/${articleId}/learn`

                axios.post(url,{
                    user_id: this.userAuth.id
                })
                .then(response => {
                    this.learned = true
                    this.learnReCount = response.data.learnCount
                })
                .catch(error => {
                    alert(error)
                })
            },
            unlearn(articleId) {
                const url = `/api/articles/${articleId}/unlearn`

                axios.post(url,{
                    user_id: this.userAuth.id
                })
                    .then(response => {
                        this.learned = false
                        this.learnReCount = response.data.learnCount
                    })
                    .catch(error => {
                        alert(error)
                    })
            }
        }
    }
</script>

