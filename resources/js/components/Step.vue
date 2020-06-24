<template>
    <div class="p-step-panel c-panel">

        <!-- パネル全体をリンクにする -->
        <a v-bind:href="stepRoute" class="p-step-panel__link-large" title="チャレンジページ"></a>

        <div class="p-step-panel__stepImg-area">
            <img v-bind:src="uploadedImage" class="p-step-panel__stepImg" alt="STEPの画像">
        </div>

        <div class="p-step-panel__contents">

            <div class="p-step-panel__title-area l-flexbox">
                <h3 class="p-step-panel__title">{{limitTitle}}</h3>
            </div>

            <div class="p-step-panel__item">
                <span v-if="stepCategories.length === 0" class="p-step-panel__category c-badge">
                    カテゴリー未登録
                </span>
                <span v-else v-for="category in stepCategories" class="p-step-panel__category c-badge">
                    {{ category.name }}
                </span>
            </div>

            <div class="p-step-panel__item">
                <p class="u-text-gray-500">
                    目安達成時間：{{step.time}} 時間
                </p>
            </div>

            <div class="p-step-panel__item">
                <p v-if="childSteps" class="u-text-gray-500">
                    全{{childSteps.length}}ステップ
                </p>
            </div>

            <div class="p-step-panel__bottom l-flexbox">
                <div class="p-step-panel__twitter-area">
                    <a :href="'http://twitter.com/intent/tweet?url='+ stepUrl +'&text=「'+ step.title +'」に挑戦中！！&hashtags=STEP'" title="Twitterでつぶやく">
                        <i class="fab fa-twitter c-icon--twitter "></i>
                    </a>
                </div>
                <div v-bind:class="{'u-text-red': defaultChallenge, 'u-text-gray-500': !defaultChallenge}">
                        <span>
                            <i class="fas fa-fire-alt"></i>
                        </span>
                    <span>{{challengeCount}}人が挑戦中！</span>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        props: ['step', 'childSteps', 'stepCategories', 'stepUser', 'userAuth', 'challengeCount', 'stepChallenges', 'defaultChallenge','stepRoute', 'stepUrl','limitTitle'],
        data() {
            return {
                uploadedImage: this.step.step_img ? this.step.step_img:'/img/no_img_step.png',
                date: this.$moment().format(),
            };
        },
    }
</script>

