/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

window.Vue = require('vue');
window.moment = require('vue-moment');
window.VueScrollTo = require('vue-scrollto');


/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

Vue.use(require('vue-moment'));
Vue.use(VueScrollTo, {
    container: "body",
    duration: 500,
    easing: "ease"
});

// STEPの一覧表示
Vue.component('step', require('./components/Step.vue').default);
// STEPタイトル入力欄
Vue.component('steptitleform', require('./components/StepTitleForm.vue').default);
// STEP説明入力欄
Vue.component('stepdescriptionform', require('./components/StepDescriptionForm.vue').default);
// プロフィールの名前入力欄
Vue.component('usernameform', require('./components/UserNameForm.vue').default);
// プロフィールの紹介文入力欄
Vue.component('userintroduceform', require('./components/UserIntroduceForm.vue').default);
// プロフィール画像のライブプレビュー
Vue.component('imagepreview', require('./components/ImagePreview.vue').default);
// STEP画像のライブプレビュー
Vue.component('stepimagepreview', require('./components/StepImagePreview.vue').default);
// 子STEPの登録フォーム
Vue.component('childstepform', require('./components/ChildStepForm.vue').default);
// フラッシュメッセージ
Vue.component('flashmessage', require('./components/FlashMessage.vue').default);
// TOPへ戻るボタン
Vue.component('scrolltopbtn', require('./components/ScrollTopBtn.vue').default);
// ハンバーガーメニュー
Vue.component('hamburgermenu', require('./components/HamburgerMenu.vue').default);
// 会員ページのドロップダウンメニュー
Vue.component('mypagedropdown', require('./components/MypageDropDown.vue').default);
// 検索フォーム
Vue.component('searchform', require('./components/SearchForm.vue').default);
// 並び順のドロップダウンメニュー
Vue.component('sortdropdown', require('./components/SortDropDown.vue').default);

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

new Vue({
    el: '#app',
});
