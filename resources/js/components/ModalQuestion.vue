<template>

        <div>
            <i class="far fa-question-circle p-form-card__question" @mouseover="showQuestion" @mouseleave="hideQuestion" @click.self="showModal"></i>

            <transition name="fade">
                <div class="c-hoverMsg--outer">
                    <div class="c-hoverMsg">
                        <p v-if="hoverFlag" class="c-hoverMsg__txt">{{message}}</p>
                    </div>
                </div>
            </transition>

            <transition name="fade">
                <div class="c-modal" v-if="modalFlag">
                    <div class="c-modal__overlay" @click="hideModal"></div>
                    <div class="c-modal__content">
                        <p>BasicModal</p>
                        <span @click="hideModal">closeModal</span>
                    </div>
                </div>
            </transition>
        </div>


</template>

<script>
    export default {
        name: "ModaQuestion",
        data() {
            return {
                message: 'マークダウン記法について',
                hoverFlag: false,
                modalFlag: false,
            }
        },
        methods: {
            showQuestion() {
                this.hoverFlag = true
            },
            hideQuestion() {
                this.hoverFlag = false
            },
            showModal() {
                this.hoverFlag = false
                this.modalFlag = true
            },
            hideModal() {
                this.modalFlag = false
            },
        }

    }
</script>

<style scoped>
    .fade-enter-active, .fade-leave-active {
        will-change: opacity;
        transition: opacity 500ms cubic-bezier(0.4, 0, 0.2, 1) 0ms;
    }
    .fade-enter, .fade-leave-to {
        opacity: 0
    }
</style>
