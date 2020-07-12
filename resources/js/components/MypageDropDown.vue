<template>
    <li @mouseover="mouseover" @mouseleave="mouseleave" class="c-navbar-top__trigger c-dropdown-trigger hide-on-md">

        会員メニュー
<!--        <i v-if="showMenu" class="fas fa-caret-up"></i>-->
        <i class="fas fa-caret-down"></i>

        <ul :class="{ isOpen }" class="c-dropdown">

            <li class="c-dropdown__item">
                <a :href="mypageRoute" class="c-dropdown__link c-navbar-top__link" title="マイページ">{{mypageLink}}</a>
            </li>

            <li class="c-dropdown__item">
                <a :href="logoutRoute"  class="c-dropdown__link c-navbar-top__link"
                   onclick="event.preventDefault();
                                document.getElementById('logout-form').submit();">
                    {{logoutLink}}
                </a>
                <form id="logout-form" :action="logoutRoute" method="POST" style="display: none;">
                    <input type="hidden" name="_token" :value="csrf">
                </form>
            </li>

        </ul>
    </li>
</template>

<script>
    export default {
        props: ['mypageRoute', 'logoutRoute', 'mypageLink', 'logoutLink'],
        data() {
            return{
                isOpen: false,
                csrf: document.querySelector('meta[name="csrf-token"]').getAttribute('content'),

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
