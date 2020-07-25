<template>
    <div>
        <span v-if="userAuth" @mouseover="showMsg" @mouseleave="hideMsg" class="c-btn--axios">
            <span v-if="!learned" @click="learn(article.id)" class="c-btn--addList">
                <i class="fas fa-folder-plus u-mr-xs"></i>{{learnReCount}}
            </span>
            <span v-else @click="unlearn(article.id)" class="c-btn--removeList">
                <i class="fas fa-folder-minus u-mr-xs"></i>{{learnReCount}}
            </span>
        </span>

        <span v-else class="c-btn--axios" @mouseover="showMsg" @mouseleave="hideMsg">
            <a :href="loginRoute" class="c-btn--addList">
                <i class="fas fa-folder-plus u-mr-xs"></i>{{learnReCount}}
            </a>
        </span>

        <transition name="fade">
            <div class="c-hoverMsg--outer">
                <div class="c-hoverMsg--left">
                    <p v-if="hoverFlag" class="c-hoverMsg--left__txt">
                        <span v-if="!userAuth">{{messageLogin}}</span>
                        <span v-else-if="!learned">{{messageAdd}}</span>
                        <span v-else>{{messageRemove}}</span>
                    </p>
                </div>
            </div>
        </transition>
    </div>
</template>

<script>
    export default {
        name: "LearnBtn",
        props: ['article', 'articleId', 'learnCount', 'userAuth', 'defaultLearn', 'loginRoute'],
        data() {
            return {
                // axios
                learned: false,
                learnReCount: 0,
                // ホバーメッセージ
                hoverFlag: false,
                messageLogin: 'ログインが必要です',
                messageAdd: '学習リストに追加する',
                messageRemove: '学習リストから削除する',
            }
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
            },
            showMsg() {
                this.hoverFlag = true
            },
            hideMsg() {
                this.hoverFlag = false
            },
        }
    }
</script>

<style scoped>

</style>
