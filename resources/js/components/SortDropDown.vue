<template>
    <ul class="u-ml-auto">

        <!-- showMenuを切り替える -->
        <li @click.stop="showMenu = !showMenu" class="c-dropdown-trigger">

            <span v-if="ascFlg">
                投稿順
                <i v-if="showMenu" class="fas fa-caret-up"></i>
                <i v-else class="fas fa-caret-down"></i>
            </span>
            <span v-else>
                最新順
                <i v-if="showMenu" class="fas fa-caret-up"></i>
                <i v-else class="fas fa-caret-down"></i>
            </span>

            <ul v-if="showMenu" class="c-dropdown" >
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
                showMenu: false,
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
