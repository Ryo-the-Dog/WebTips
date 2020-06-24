<template>
    <div>
        <div class="c-navbar-trigger" @click="navOpen" :class="{'active': active}">
            <span class="c-navbar-trigger__border"></span>
            <span class="c-navbar-trigger__border"></span>
            <span class="c-navbar-trigger__border"></span>
        </div>

        <nav class="p-navbar" :class="{'active': active}">

            <ul class="c-navbar-top l-flexbox ml-auto" v-if="guestFlg">

                <li class="c-navbar-top__item">
                    <a :href="loginRoute" class="c-navbar-top__link" title="ログインページ">{{loginLink}}</a>
                </li>
                <li class="c-navbar-top__item">
                    <a :href="registerRoute" class="c-btn c-btn--yellow" title="会員登録ページ"><i class="fas fa-user u-mr-xs"></i>{{registerLink}}</a>
                </li>

            </ul>

            <ul class="c-navbar-top l-flexbox ml-auto" v-else-if="authFlg">

                <MypageDropDown
                    :mypageRoute="mypageRoute"
                    :logoutRoute="logoutRoute"
                    :mypageLink="mypageLink"
                    :logoutLink="logoutLink"
                ></MypageDropDown>

                <li class="c-navbar-top__item show-on-md">
                    <a :href="logoutRoute"  class="c-navbar-top__link"
                       onclick="event.preventDefault();
                                document.getElementById('logout-form').submit();">
                        {{logoutLink}}
                    </a>
                    <form id="logout-form" :action="logoutRoute" method="POST" style="display: none;">
                        <input type="hidden" name="_token" :value="csrf">
                    </form>
                </li>

                <li class="c-navbar-top__item show-on-md">
                    <a :href="mypageRoute" class="c-navbar-top__link" title="マイページ">{{mypageLink}}</a>
                </li>

                <li class="c-navbar-top__item">
                    <a :href="postRoute" class="c-btn c-btn--yellow" title="STEP投稿ページ"><i class="fas fa-pen u-mr-xs"></i>{{postLink}}</a>
                </li>


            </ul>
        </nav>
    </div>
</template>

<script>
    import MypageDropDown from "./MypageDropDown";
    export default {
        components: {MypageDropDown},
        props: ['guestFlg' ,'authFlg', 'loginRoute', 'registerRoute', 'mypageRoute', 'logoutRoute','postRoute', 'loginLink', 'registerLink', 'mypageLink', 'logoutLink', 'postLink'],
        data() {
            return{
                active: false,
                csrf: document.querySelector('meta[name="csrf-token"]').getAttribute('content'),

            }
        },
        methods: {
            // ハンバーガーメニューの開閉
            navOpen: function() {
                this.active = !this.active;
            }
        }
    }
</script>

<style scoped>

</style>
