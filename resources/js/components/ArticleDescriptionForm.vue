<template>
    <div>
        <textarea id="description" class="c-textarea" :class="{'c-is-invalid':error}" name="description" v-model="dataInputDescription"
                  required maxlength="1000" autocomplete="description" autofocus placeholder="1000文字以内">{{dataInputDescription}}</textarea>
        <span class="c-counter">{{dataInputDescription ? dataInputDescription.length : 0}} / 1000</span>
    </div>
</template>

<script>
    export default {
        props: [ 'inputDescription', 'error'],
        data() {
            return {
                dataInputDescription: this.inputDescription,
            }
        }
    }
</script>

<style scoped>

</style>
