<template>
    <li @click="menuOpen" class="c-navbar-top__trigger c-dropdown-trigger hide-on-md">

        会員メニュー
        <i v-if="isOpen" class="fas fa-caret-up"></i>
        <i v-else class="fas fa-caret-down"></i>

        <ul class="c-dropdown" :class="{ isOpen }">

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
            menuOpen: function () {
                this.isOpen = !this.isOpen;
            }
        }
    }
</script>

<style scoped>

</style>
