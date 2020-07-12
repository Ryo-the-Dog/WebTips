/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

window.Vue = require('vue');
window.moment = require('vue-moment');
window.VueScrollTo = require('vue-scrollto');

// axios
window.axios = require('axios');
window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest'

const token = document.head.querySelector('meta[name="csrf-token"]')
if(token) {
    window.axios.defaults.headers.common['X-CSRF-TOKEN'] = token.content
}

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

// 記事の一覧表示
Vue.component('articleitem', require('./components/ArticleItem.vue').default);
// 記事タイトル入力欄
Vue.component('articletitleform', require('./components/ArticleTitleForm.vue').default);
// 記事説明入力欄
Vue.component('articledescriptionform', require('./components/ArticleDescriptionForm.vue').default);
// プロフィールの名前入力欄
Vue.component('usernameform', require('./components/UserNameForm.vue').default);
// プロフィールの紹介文入力欄
Vue.component('userintroduceform', require('./components/UserIntroduceForm.vue').default);
// プロフィール画像のライブプレビュー
Vue.component('imagepreview', require('./components/ImagePreview.vue').default);
// 記事画像のライブプレビュー
Vue.component('articleimagepreview', require('./components/ArticleImagePreview.vue').default);
// クエスチョンモーダル
Vue.component('modalquestion', require('./components/ModalQuestion.vue').default);
// チャプターの登録フォーム
Vue.component('chapterform', require('./components/ChapterForm.vue').default);
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
// リスト追加ボタン
Vue.component('learnbtn', require('./components/LearnBtn.vue').default);
// 学習済みボタン
Vue.component('clearbtn', require('./components/ClearBtn.vue').default);

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

new Vue({
    el: '#app',
});
