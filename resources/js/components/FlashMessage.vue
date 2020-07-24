<template>
    <div>
        <transition appear>
            <div class="c-flash-message" v-if="show">
                {{flashMessage}}
            </div>
        </transition>
    </div>
</template>

<script>
    export default {
        props: ['flashMessage'],
        data() {
            return{
                show: false
            }
        },
        methods: {
            // 指定した秒数経過後にメッセージを消す
            showFlashMessage: function() {
                this.show = true;
                setTimeout(() => {
                        this.show = false}
                    ,2000
                )
            }
        },
        created() {
            this.showFlashMessage()
        }
    }
</script>

<style scoped>
    .v-leave-active,
    .v-enter-active {
        transition: opacity 1s;
    }
    .v-enter,
    .v-leave-to {
        opacity: 0;
    }
</style>
