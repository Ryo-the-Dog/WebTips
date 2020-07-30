<template>
    <div class="p-form-card__input-area">

        <input class="c-input " id="file-sample" type="file" name="article_img"
               v-preview-input="uploadedImage"
               @change="onFileChange">

        <div class="p-form-card__articleImg-area">
            <img class="p-form-card__articleImg" id="file-preview"
                 v-show="uploadedImage"
                 v-bind:src="uploadedImage"
                 alt="記事の画像">
        </div>

        <span class="c-invalid-feedback" role="alert">
            <strong>{{ error }}</strong>
        </span>

    </div>
</template>

<script>
    export default {
        props: ['article','articleImg'],
        data() {
            return {
                uploadedImage: this.articleImg ? this.articleImg : '/img/no_img_article.jpg',
                sizeLimit: 1024000,
                error: null,
            }
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
