<template>
    <div>
        <transition name="fade">
            <a href="#" v-scroll-to="'#header'" v-show="isShow" class="c-scroll-top" >
                <i class="fa fa-angle-up fa-lg c-scroll-top__icon"></i>
            </a>
        </transition>
    </div>
</template>

<script>
    export default {
        data() {
            return {
                scrollY: 0
            };
        },
        mounted() {
            // スクロールを取得
            window.addEventListener("scroll", this.onScroll);
            window.addEventListener("load", () => {
                this.onScroll();
            });
        },
        computed: {
            isShow() {
                return this.scrollY > 300;
            }
        },
        methods: {
            // スクロール値の取得
            onScroll() {
                this.scrollY = window.pageYOffset;
            }
        }
    }
</script>

<style scoped>
    .fade-enter-active,
    .fade-leave-active {
        transition: opacity 0.5s;
    }
    .fade-enter,
    .fade-leave-to {
        opacity: 0;
    }
</style>
