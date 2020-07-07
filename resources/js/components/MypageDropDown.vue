<template>
    <li @mouseover.stop="showMenu = !showMenu" class="c-navbar-top__trigger c-dropdown-trigger hide-on-md">

        会員メニュー
        <i v-if="showMenu" class="fas fa-caret-up"></i>
        <i v-else class="fas fa-caret-down"></i>

        <ul v-if="showMenu" class="c-dropdown">

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
                showMenu: false,
                csrf: document.querySelector('meta[name="csrf-token"]').getAttribute('content'),

            }
        },
        methods: {
            // ドロップダウン外をクリックしたときに閉じるメソッド
            close :function () {
                this.showMenu = false
            },
            listen :function(target, eventType, callback) {
                if (!this._eventRemovers){
                    this._eventRemovers = []
                }
                target.addEventListener(eventType, callback)
                this._eventRemovers.push( {
                    remove :function() {
                        target.removeEventListener(eventType, callback)
                    }
                })
            },
        },
        created:function(){

            this.listen(window, 'click', function(e){
                // this.$elで自身のDOM(開閉ボタン)を取得
                if (!this.$el.contains(e.target)){
                    this.close()
                }
            }.bind(this))
        },
        destroyed:function(){
            if (this._eventRemovers){
                this._eventRemovers.forEach(function(eventRemover){
                    eventRemover.remove()
                })
            }
        },
    }
</script>

<style scoped>

</style>
