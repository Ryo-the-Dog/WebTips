<template>
    <div>
        <input id="name" type="text" class="c-input" :class="{'c-is-invalid':error}"
               name="name" v-model="dataInputName" placeholder="20文字以内"
               required maxlength="20" autocomplete="name" autofocus>
        <span class="c-counter">{{dataInputName ? dataInputName.length : 0}} / 20</span>

    </div>
</template>

<script>
    export default {
        props: [ 'inputName', 'error'],
        data() {
            return {
                dataInputName: this.inputName,
            }
        }
    }
</script>

<style scoped>

</style>
