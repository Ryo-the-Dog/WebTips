<template>
    <div>
        <textarea id="introduce" class="c-textarea" :class="{'c-is-invalid':error}" name="introduce" v-model="dataInputIntroduce"
                  required maxlength="255" autocomplete="introduce" autofocus placeholder="255文字以内">{{dataInputIntroduce}}</textarea>
        <span class="c-counter">{{dataInputIntroduce ? dataInputIntroduce.length : 0}} / 255</span>
    </div>
</template>

<script>
    export default {
        props: [ 'inputIntroduce', 'error'],
        data() {
            return {
                dataInputIntroduce: this.inputIntroduce,
            }
        }
    }
</script>

<style scoped>

</style>
