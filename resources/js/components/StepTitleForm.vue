<template>
    <div>
        <input id="title" type="text" class="c-input" :class="{'c-is-invalid':error}"
               name="title" v-model="dataInputTitle" placeholder="255文字以内"
               required maxlength="255" autocomplete="title" autofocus>
        <span class="c-counter">{{dataInputTitle ? dataInputTitle.length : 0}} / 255</span>

    </div>
</template>

<script>
    export default {
        props: [ 'inputTitle', 'error'],
        data() {
            return {
                dataInputTitle: this.inputTitle,
            }
        }
    }
</script>

<style scoped>

</style>
