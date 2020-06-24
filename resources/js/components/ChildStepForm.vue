<template>
    <div>
        <div v-for="childStepForm in this.childStepForms" :key="childStepForm.id">

            <div class="p-form-card__group">
                <label :for="'child_step_title_'+childStepForm.id" class="p-form-card__label">{{childStepForm.id}}：タイトル</label>
                <div class="p-form-card__input-area">
                    <input :id="'child_step_title_'+childStepForm.id" type="text" class="c-input"
                           :name="'child_step['+childStepForm.id+'][title]'" v-model="childStepForm.currentTitle"
                           maxlength="255" autocomplete="child_step_title" autofocus >
                </div>
                <span class="c-counter">{{childStepForm.currentTitle ? childStepForm.currentTitle.length : 0}} / 255</span>
            </div>

            <div class="p-form-card__group">
                <label :for="'child_step_content_'+childStepForm.id" class="p-form-card__label">{{childStepForm.id}}：内容</label>
                <div class="p-form-card__input-area">
                    <textarea :id="'child_step_content_'+childStepForm.id" type="text" class="c-textarea"
                              :name="'child_step['+childStepForm.id+'][content]'" v-model="childStepForm.currentContent"
                              maxlength="1000" autocomplete="child_step_content" autofocus>{{childStepForm.currentContent}}</textarea>
                </div>
                <span class="c-counter">{{childStepForm.currentContent ? childStepForm.currentContent.length : 0}} / 1000</span>
            </div>

            <div class="p-form-card__group">
                <label :for="'child_step_time_'+childStepForm.id" class="p-form-card__label">{{childStepForm.id}}：時間(1000時間以内)</label>
                <div class="p-form-card__input-area">
                    <input :id="'child_step_time_'+childStepForm.id" type="number" class="c-input p-form-card__time-input"
                           :name="'child_step['+childStepForm.id+'][time]'" v-model="childStepForm.currentTime"
                           min="1" max="1000" autocomplete="child_step_time" autofocus>
                    <span class="p-form-card__time">時間</span>
                </div>
            </div>

        </div>

        <ul class="p-form-card__invalid-list">
            <li v-for="error in errors" class="c-invalid-feedback"><strong>{{ error }}</strong></li>
        </ul>

        <div v-if="!stepLimit" class="p-form-card__add-btn-area">
            <button @click.prevent="addChildStepForm()" class="p-form-card__add-btn u-text-gray-500"><i class="fas fa-plus-circle"></i>STEPを追加する</button>
        </div>
    </div>
</template>

<script>
    export default {
        props: [ 'oldInputs', 'currentInputs'],
        data() {
            return{
                childStepFormList: [
                    {
                        id: 1,
                        currentTitle: this.checkInput(this.oldInputs, this.currentInputs, 0, 'title'),
                        currentContent: this.checkInput(this.oldInputs, this.currentInputs, 0, 'content'),
                        currentTime: this.checkInput(this.oldInputs, this.currentInputs, 0, 'time'),
                    },
                    {
                        id: 2,
                        currentTitle: this.checkInput(this.oldInputs, this.currentInputs, 1, 'title'),
                        currentContent: this.checkInput(this.oldInputs, this.currentInputs, 1, 'content'),
                        currentTime: this.checkInput(this.oldInputs, this.currentInputs, 1, 'time'),
                    },
                    {
                        id: 3,
                        currentTitle: this.checkInput(this.oldInputs, this.currentInputs, 2, 'title'),
                        currentContent: this.checkInput(this.oldInputs, this.currentInputs, 2, 'content'),
                        currentTime: this.checkInput(this.oldInputs, this.currentInputs, 2, 'time'),
                    },
                    {
                        id: 4,
                        currentTitle: this.checkInput(this.oldInputs, this.currentInputs, 3, 'title'),
                        currentContent: this.checkInput(this.oldInputs, this.currentInputs, 3, 'content'),
                        currentTime: this.checkInput(this.oldInputs, this.currentInputs, 3, 'time'),
                    },
                    {
                        id: 5,
                        currentTitle: this.checkInput(this.oldInputs, this.currentInputs, 4, 'title'),
                        currentContent: this.checkInput(this.oldInputs, this.currentInputs, 4, 'content'),
                        currentTime: this.checkInput(this.oldInputs, this.currentInputs, 4, 'time'),
                    },
                    {
                        id: 6,
                        currentTitle: this.checkInput(this.oldInputs, this.currentInputs, 5, 'title'),
                        currentContent: this.checkInput(this.oldInputs, this.currentInputs, 5, 'content'),
                        currentTime: this.checkInput(this.oldInputs, this.currentInputs, 5, 'time'),
                    },
                    {
                        id: 7,
                        currentTitle: this.checkInput(this.oldInputs, this.currentInputs, 6, 'title'),
                        currentContent: this.checkInput(this.oldInputs, this.currentInputs, 6, 'content'),
                        currentTime: this.checkInput(this.oldInputs, this.currentInputs, 6, 'time'),
                    },
                    {
                        id: 8,
                        currentTitle: this.checkInput(this.oldInputs, this.currentInputs, 7, 'title'),
                        currentContent: this.checkInput(this.oldInputs, this.currentInputs, 7, 'content'),
                        currentTime: this.checkInput(this.oldInputs, this.currentInputs, 7, 'time'),
                    },
                    {
                        id: 9,
                        currentTitle: this.checkInput(this.oldInputs, this.currentInputs, 8, 'title'),
                        currentContent: this.checkInput(this.oldInputs, this.currentInputs, 8, 'content'),
                        currentTime: this.checkInput(this.oldInputs, this.currentInputs, 8, 'time'),
                    },
                    {
                        id: 10,
                        currentTitle: this.checkInput(this.oldInputs, this.currentInputs, 9, 'title'),
                        currentContent: this.checkInput(this.oldInputs, this.currentInputs, 9, 'content'),
                        currentTime: this.checkInput(this.oldInputs, this.currentInputs, 9, 'time'),
                    },

                ],
                // 登録済みのSTEPがあればその個数分フォームを表示、oldの入力があればその個数分フォームを表示する
                count: (this.oldInputs) ? this.trimOldInputs(this.oldInputs) : (this.currentInputs) ? this.currentInputs.length : 1,
                errors: [],
            }
        },
        methods: {
            // 子STEPフォームを追加
            addChildStepForm: function () {
                this.errors = []
                    // 現在表示されているフォームが空の場合は追加させない
                    if(this.childStepFormList[this.count-1]['currentTitle'] === '' || this.childStepFormList[this.count-1]['currentTitle'] === null
                        || this.childStepFormList[this.count-1]['currentContent'] === '' || this.childStepFormList[this.count-1]['currentContent'] === null
                        || this.childStepFormList[this.count-1]['currentTime'] === '' || this.childStepFormList[this.count-1]['currentTime'] === null){
                        this.errors.push('STEPのタイトル・内容・時間を入力してください。')
                        return false
                }
                // countの値を増やすことで子STEPのフォーム数を増やす
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
                    if(obj[count]['title']===null && obj[count]['content']===null && obj[count]['time']===null){
                        obj[count]['title'] = ""
                        obj[count]['content'] = ""
                        obj[count]['time'] = ""
                        count--
                    }
                    // もし１つ目の子STEPフォームが空欄で送信された場合、上記の処理で０になってしまうので１つは表示されるようにする
                    if(count < 1){
                        count = 1
                    }
                    return count
                }
            },
        },
        computed: {
            childStepForms: function () {
                // 子STEPをcountの数値分表示する
                return this.childStepFormList.slice(0, this.count)
            },
            //子STEPフォームの数が10以上になったらtrueを返す
            stepLimit: function () {
                return (this.count >= 10)
            },

        }
    }

</script>

