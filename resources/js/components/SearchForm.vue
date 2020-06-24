<template>
    <div class="p-search-wrapper u-ml-auto" :class="{'active': active}">

        <form method="get" :action="actionRoute" :class="{'active': active}" class="p-search">

            <input type="text" name="keyword" v-model="dataKeyword" class="c-input p-search__input" placeholder="タイトルを検索">

            <button type="submit" class="p-search__search-btn">
                <i class="fas fa-search c-icon--search"></i>
            </button>

            <button type="button" @click="formOpen" class="p-search__close-btn">
                <i class="fas fa-times c-icon--close"></i>
            </button>

        </form>

        <button @click="formOpen" :class="{'hide': hide}" class="p-search__trigger">
            <i class="fas fa-search c-icon--open-search"></i>
        </button>

    </div>
</template>

<script>
    export default {
        props: ['keyword', 'actionRoute'],
        data() {
            return{
                dataKeyword: this.keyword,
                active: false,
                hide: false,
            }
        },
        methods: {
            // 検索欄の開閉
            formOpen: function() {
                this.active = !this.active;
                this.hide = !this.hide;
            },
        }
    }
</script>

<style scoped>

</style>
