<template>
    <div class="p-form-card__input-area">
        <input class="c-input " id="file-sample" type="file" name="user_img"
               v-preview-input="uploadedImage"
               @change="onFileChange">
        <div class="p-form-card__img-area">
            <img class="c-avatar" id="file-preview"
                 v-show="uploadedImage"
                 v-bind:src="uploadedImage"
                 alt="プロフィール画像">
        </div>
        <span class="c-invalid-feedback" role="alert">
            <strong>{{ error }}</strong>
        </span>
    </div>
</template>

<script>
    export default {
        props: ['auth'],
        data() {
            return {
                uploadedImage: this.auth.user_img ? this.auth.user_img : '/img/blank-profile.png',
                sizeLimit: 1024000,
                error: null,
            };
        },
        methods: {
            onFileChange(e) {
                let files = e.target.files;
                if(files[0].size > this.sizeLimit){
                    this.error = '画像サイズは1MB以下にしてください'
                    return false
                }else{
                    this.error = null
                }
                this.createImage(files[0]); //File情報格納
            },
            //アップロードした画像を表示
            createImage(file) {
                let reader = new FileReader(); //File API生成
                reader.onload = (e) => {
                    this.uploadedImage = e.target.result;
                };

                reader.readAsDataURL(file);
            },
        },
    }

</script>

<style scoped>

</style>
