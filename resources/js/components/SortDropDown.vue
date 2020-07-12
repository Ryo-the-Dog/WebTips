<template>
    <ul class="u-ml-auto">

        <!-- showMenuを切り替える -->
        <li @mouseover="mouseover" @mouseleave="mouseleave" class="c-dropdown-trigger">

            <span v-if="ascFlg">
                投稿順
<!--                <i v-if="showMenu" class="fas fa-caret-up"></i>-->
                <i class="fas fa-caret-down"></i>
            </span>
            <span v-else>
                最新順
<!--                <i v-if="showMenu" class="fas fa-caret-up"></i>-->
                <i class="fas fa-caret-down"></i>
            </span>

            <ul :class="{ isOpen }" class="c-dropdown" >
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
            mouseover: function () {
                this.isOpen = true
            },
            mouseleave: function () {
                this.isOpen = false
            },
        },

    }
</script>

<style scoped>

</style>
