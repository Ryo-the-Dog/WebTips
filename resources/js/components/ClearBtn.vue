<template>
    <div>
        <span v-if="!cleared" @click="clear(article.id)" class="u-mr-xs c-btn--cleared">
            <i class="fas fa-check-circle u-mr-xs"></i>{{clearedEn}}
        </span>
        <span v-else @click="unclear(article.id)" class="u-mr-xs c-btn--uncleared">
            <i class="fas fa-times-circle u-mr-xs"></i>{{notclearedEn}}
        </span>
    </div>
</template>

<script>
    export default {
        name: "ClearBtn",
        props: ['notclearedEn', 'clearedEn','article', 'articleId', 'userAuth', 'defaultClear'],
        data() {
            return {
                // axios
                cleared: false,
                // clearReCount: 0,
            };
        },
        created() {
            this.cleared = this.defaultClear
            // this.clearReCount = this.clearCount
        },
        methods: {
            clear(articleId) {
                const url = `/api/articles/${articleId}/clear`

                axios.post(url,{
                    user_id: this.userAuth.id
                })
                    .then(response => {
                        this.cleared = true
                        // this.clearReCount = response.data.clearCount
                    })
                    .catch(error => {
                        alert(error)
                    })
            },
            unclear(articleId) {
                const url = `/api/articles/${articleId}/unclear`

                axios.post(url,{
                    user_id: this.userAuth.id
                })
                    .then(response => {
                        this.cleared = false
                        // this.clearReCount = response.data.clearCount
                    })
                    .catch(error => {
                        alert(error)
                    })
            }
        }
    }
</script>

<style scoped>

</style>
