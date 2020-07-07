<template>
    <ul class="u-ml-auto">

        <li @click="menuOpen" class="c-dropdown-trigger">

            <span v-if="ascFlg">
                投稿順
                <i v-if="isOpen" class="fas fa-caret-up"></i>
                <i v-else class="fas fa-caret-down"></i>
            </span>
            <span v-else>
                最新順
                <i v-if="isOpen" class="fas fa-caret-up"></i>
                <i v-else class="fas fa-caret-down"></i>
            </span>

            <ul class="c-dropdown" :class="{ isOpen }">
                <li class="c-dropdown__item">
                    <a :href="ascRoute" class="c-dropdown__link c-navbar-bottom__dropdown-link">投稿順</a>
                </li>
                <li class="c-dropdown__item">
                    <a :href="descRoute" class="c-dropdown__link c-navbar-bottom__dropdown-link">最新順</a>
                </li>
            </ul>

        </li>

    </ul>
</template>

<script>
    export default {
        props: ['ascRoute', 'descRoute', 'sortId', 'ascFlg', 'descFlg'],
        data() {
            return{
                isOpen: false,
            }
        },
        methods: {
            menuOpen: function () {
                this.isOpen = !this.isOpen;
            }
        }
    }
</script>

<style scoped>

</style>
