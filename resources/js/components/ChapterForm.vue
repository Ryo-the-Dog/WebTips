<template>
    <div>
        <div v-for="chapterForm in this.chapterForms" :key="chapterForm.id">

            <div class="p-form-card__group">
                <label :for="'chapter_title_'+chapterForm.id" class="p-form-card__label">{{chapterForm.id}}：見出し</label>
                <div class="p-form-card__input-area">
                    <input :id="'chapter_title_'+chapterForm.id" type="text" class="c-input"
                           :name="'chapter['+chapterForm.id+'][title]'" v-model="chapterForm.currentTitle"
                           maxlength="255" autocomplete="chapter_title" autofocus >
                </div>
                <span class="c-counter">{{chapterForm.currentTitle ? chapterForm.currentTitle.length : 0}} / 255</span>
            </div>

            <div class="p-form-card__group">
                <label :for="'chapter_content_'+chapterForm.id" class="p-form-card__label">{{chapterForm.id}}：内容(マークダウン記法)</label>
                <div class="p-form-card__input-area">
                    <textarea :id="'chapter_content_'+chapterForm.id" type="text" class="c-textarea c-textarea--step-content"
                              :name="'chapter['+chapterForm.id+'][content]'" v-model="chapterForm.currentContent"
                              maxlength="10000" autocomplete="chapter_content" autofocus>{{chapterForm.currentContent}}</textarea>
                </div>
                <span class="c-counter">{{chapterForm.currentContent ? chapterForm.currentContent.length : 0}} / 10000</span>
            </div>

        </div>

        <ul class="p-form-card__invalid-list">
            <li v-for="error in errors" class="c-invalid-feedback"><strong>{{ error }}</strong></li>
        </ul>

        <div v-if="!chapterLimit" class="p-form-card__add-btn-area">
            <button @click.prevent="addChapterForm()" class="p-form-card__add-btn u-text-gray-500"><i class="fas fa-plus-circle"></i>チャプターを追加する</button>
        </div>
    </div>
</template>

<script>
    export default {
        props: [ 'oldInputs', 'currentInputs'],
        data() {
            return{
                chapterFormList: [
                    {
                        id: 1,
                        currentTitle: this.checkInput(this.oldInputs, this.currentInputs, 0, 'title'),
                        currentContent: this.checkInput(this.oldInputs, this.currentInputs, 0, 'content'),
                    },
                    {
                        id: 2,
                        currentTitle: this.checkInput(this.oldInputs, this.currentInputs, 1, 'title'),
                        currentContent: this.checkInput(this.oldInputs, this.currentInputs, 1, 'content'),
                    },
                    {
                        id: 3,
                        currentTitle: this.checkInput(this.oldInputs, this.currentInputs, 2, 'title'),
                        currentContent: this.checkInput(this.oldInputs, this.currentInputs, 2, 'content'),
                    },
                    {
                        id: 4,
                        currentTitle: this.checkInput(this.oldInputs, this.currentInputs, 3, 'title'),
                        currentContent: this.checkInput(this.oldInputs, this.currentInputs, 3, 'content'),
                    },
                    {
                        id: 5,
                        currentTitle: this.checkInput(this.oldInputs, this.currentInputs, 4, 'title'),
                        currentContent: this.checkInput(this.oldInputs, this.currentInputs, 4, 'content'),
                    },
                    {
                        id: 6,
                        currentTitle: this.checkInput(this.oldInputs, this.currentInputs, 5, 'title'),
                        currentContent: this.checkInput(this.oldInputs, this.currentInputs, 5, 'content'),
                    },
                    {
                        id: 7,
                        currentTitle: this.checkInput(this.oldInputs, this.currentInputs, 6, 'title'),
                        currentContent: this.checkInput(this.oldInputs, this.currentInputs, 6, 'content'),
                    },
                    {
                        id: 8,
                        currentTitle: this.checkInput(this.oldInputs, this.currentInputs, 7, 'title'),
                        currentContent: this.checkInput(this.oldInputs, this.currentInputs, 7, 'content'),
                    },
                    {
                        id: 9,
                        currentTitle: this.checkInput(this.oldInputs, this.currentInputs, 8, 'title'),
                        currentContent: this.checkInput(this.oldInputs, this.currentInputs, 8, 'content'),
                    },
                    {
                        id: 10,
                        currentTitle: this.checkInput(this.oldInputs, this.currentInputs, 9, 'title'),
                        currentContent: this.checkInput(this.oldInputs, this.currentInputs, 9, 'content'),
                    },
                    {
                        id: 11,
                        currentTitle: this.checkInput(this.oldInputs, this.currentInputs, 10, 'title'),
                        currentContent: this.checkInput(this.oldInputs, this.currentInputs, 10, 'content'),
                    },
                    {
                        id: 12,
                        currentTitle: this.checkInput(this.oldInputs, this.currentInputs, 11, 'title'),
                        currentContent: this.checkInput(this.oldInputs, this.currentInputs, 11, 'content'),
                    },
                    {
                        id: 13,
                        currentTitle: this.checkInput(this.oldInputs, this.currentInputs, 12, 'title'),
                        currentContent: this.checkInput(this.oldInputs, this.currentInputs, 12, 'content'),
                    },
                    {
                        id: 14,
                        currentTitle: this.checkInput(this.oldInputs, this.currentInputs, 13, 'title'),
                        currentContent: this.checkInput(this.oldInputs, this.currentInputs, 13, 'content'),
                    },
                    {
                        id: 15,
                        currentTitle: this.checkInput(this.oldInputs, this.currentInputs, 14, 'title'),
                        currentContent: this.checkInput(this.oldInputs, this.currentInputs, 14, 'content'),
                    },
                    {
                        id: 16,
                        currentTitle: this.checkInput(this.oldInputs, this.currentInputs, 15, 'title'),
                        currentContent: this.checkInput(this.oldInputs, this.currentInputs, 15, 'content'),
                    },
                    {
                        id: 17,
                        currentTitle: this.checkInput(this.oldInputs, this.currentInputs, 16, 'title'),
                        currentContent: this.checkInput(this.oldInputs, this.currentInputs, 16, 'content'),
                    },
                    {
                        id: 18,
                        currentTitle: this.checkInput(this.oldInputs, this.currentInputs, 17, 'title'),
                        currentContent: this.checkInput(this.oldInputs, this.currentInputs, 17, 'content'),
                    },
                    {
                        id: 19,
                        currentTitle: this.checkInput(this.oldInputs, this.currentInputs, 18, 'title'),
                        currentContent: this.checkInput(this.oldInputs, this.currentInputs, 18, 'content'),
                    },
                    {
                        id: 20,
                        currentTitle: this.checkInput(this.oldInputs, this.currentInputs, 19, 'title'),
                        currentContent: this.checkInput(this.oldInputs, this.currentInputs, 19, 'content'),
                    },

                ],
                // 登録済みの項目があればその個数分フォームを表示、oldの入力があればその個数分フォームを表示する
                count: (this.oldInputs) ? this.trimOldInputs(this.oldInputs) : (this.currentInputs) ? this.currentInputs.length : 1,
                errors: [],
            }
        },
        methods: {
            // チャプターフォームを追加
            addChapterForm: function () {
                this.errors = []
                    // 現在表示されているフォームが空の場合は追加させない
                    if(this.chapterFormList[this.count-1]['currentTitle'] === '' || this.chapterFormList[this.count-1]['currentTitle'] === null
                        || this.chapterFormList[this.count-1]['currentContent'] === '' || this.chapterFormList[this.count-1]['currentContent'] === null){
                        this.errors.push('チャプターのタイトル・内容を入力してください。')
                        return false
                }
                // countの値を増やすことでチャプターのフォーム数を増やす
                this.count++
            },
            checkInput: function (old, current, id, key) {

                if(old){
                    // oldの情報があれば入力内容をoldに変える
                    return (old) ? (old[id+1]) ? old[id+1][key]: '' : ''
                }else{

                    return (current) ? (current[id]) ? current[id][key]: '' : ''
                }
            },
            trimOldInputs: function (obj) {
                // 渡されたoldの情報の数を格納
                let count = Object.keys(obj).length

                if(obj){
                    // oldは入力内容が空欄でもnullで渡されてしまうので、nullだった場合は入力欄を表示しないようにする
                    if(obj[count]['title']===null && obj[count]['content']===null ){
                        obj[count]['title'] = ""
                        obj[count]['content'] = ""
                        count--
                    }
                    // もし１つ目のチャプターフォームが空欄で送信された場合、上記の処理で０になってしまうので１つは表示されるようにする
                    if(count < 1){
                        count = 1
                    }
                    return count
                }
            },
        },
        computed: {
            chapterForms: function () {
                // 項目をcountの数値分表示する
                return this.chapterFormList.slice(0, this.count)
            },
            // 項目フォームの数が20以上になったらtrueを返す
            chapterLimit: function () {
                return (this.count >= 20)
            },

        }
    }

</script>

