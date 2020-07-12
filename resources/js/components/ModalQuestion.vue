<template>

        <div>
            <i class="far fa-question-circle p-form-card__question" @mouseover="showQuestion" @mouseleave="hideQuestion" @click.self="showModal"></i>

            <transition name="fade">
                <div class="c-hoverMsg--outer">
                    <div class="c-hoverMsg">
                        <p v-if="hoverFlag" class="c-hoverMsg__txt">{{message}}</p>
                    </div>
                </div>
            </transition>

            <transition name="fade">
                <div class="c-modal" v-if="modalFlag">
                    <div class="c-modal__overlay" @click="hideModal"></div>
                    <div class="c-modal__content">
                        <div class="c-modal__header">
                            <h3 class="c-modal__title">マークダウンの書き方</h3>
                        </div>

                        <div class="c-modal__body">
                            <table class="c-modal__table">

                                <tr class="c-modal__tr l-flexbox">
                                    <td class="c-modal__leftTd">
                                        <pre><span class="pl-en">puts</span><span class="pl-s">'code with syntax'</span></pre>
                                    </td>
                                    <td class="c-modal__rightTd">
                                        <textarea class="c-modal__textarea" readonly>
```ruby
puts 'code with syntax'
```
                                        </textarea>
                                    </td>
                                </tr>

                                <tr class="c-modal__tr l-flexbox">
                                    <td class="c-modal__leftTd">
                                        <h1>見出し h1</h1>
                                        <h2>見出し h2</h2>
                                        <h3>見出し h3</h3>
                                        <h4>見出し h4</h4>
                                    </td>
                                    <td class="c-modal__rightTd">
                                        <textarea class="c-modal__textarea" readonly>
# 見出し h1
## 見出し h2
### 見出し h3
#### 見出し h4
                                        </textarea>
                                    </td>
                                </tr>

                                <tr class="c-modal__tr l-flexbox">
                                    <td class="c-modal__leftTd">
                                        <ul>
                                            <li>リスト</li>
                                            <li>リスト</li>
                                        </ul>
                                    </td>
                                    <td class="c-modal__rightTd">
                                        <textarea class="c-modal__textarea" readonly>
- リスト
- リスト
                                        </textarea>
                                    </td>
                                </tr>

                                <tr class="c-modal__tr l-flexbox">
                                    <td class="c-modal__leftTd">
                                        <ol>
                                            <li>番号付きリスト</li>
                                            <li>番号付きリスト</li>
                                        </ol>
                                    </td>
                                    <td class="c-modal__rightTd">
                                        <textarea class="c-modal__textarea" readonly>
1. 番号付きリスト
2. 番号付きリスト
                                        </textarea>
                                    </td>
                                </tr>

                                <tr class="c-modal__tr l-flexbox">
                                    <td class="c-modal__leftTd">
                                        <b>強調（太字）</b>
                                        <br/>
                                        <i>強調（斜体）</i>
                                        <br/>
                                        <s>打ち消し線</s>
                                    </td>
                                    <td class="c-modal__rightTd">
                                        <textarea class="c-modal__textarea" readonly>
**text**
*text*
~~text~~
                                        </textarea>
                                    </td>
                                </tr>

                                <tr class="c-modal__tr l-flexbox">
                                    <td class="c-modal__leftTd">
                                        <a>リンク</a>
                                    </td>
                                    <td class="c-modal__rightTd">
                                        <textarea class="c-modal__textarea" readonly>
[title](http://...)
                                        </textarea>
                                    </td>
                                </tr>

                                <tr class="c-modal__tr l-flexbox">
                                    <td class="c-modal__leftTd">
                                        <code>コードのインライン表示</code>
                                    </td>
                                    <td class="c-modal__rightTd">
                                        <textarea class="c-modal__textarea" readonly>
`code`
                                        </textarea>
                                    </td>
                                </tr>

                                <tr class="c-modal__tr l-flexbox">
                                    <td class="c-modal__leftTd">
                                        <blockquote>
                                            引用
                                            <blockquote>
                                                引用
                                            </blockquote>
                                        </blockquote>
                                    </td>
                                    <td class="c-modal__rightTd">
                                        <textarea class="c-modal__textarea" readonly>
> text
>> text
                                        </textarea>
                                    </td>
                                </tr>


                            </table>

                        </div>

                        <span @click="hideModal" class="c-modal__close"><i class="fas fa-times"></i></span>
                    </div>
                </div>
            </transition>
        </div>


</template>

<script>
    export default {
        name: "ModaQuestion",
        data() {
            return {
                message: 'マークダウン記法について',
                hoverFlag: false,
                modalFlag: false,
            }
        },
        methods: {
            showQuestion() {
                this.hoverFlag = true
            },
            hideQuestion() {
                this.hoverFlag = false
            },
            showModal() {
                this.hoverFlag = false
                this.modalFlag = true
            },
            hideModal() {
                this.modalFlag = false
            },
        }

    }
</script>

<style scoped>
    .fade-enter-active, .fade-leave-active {
        will-change: opacity;
        transition: opacity 500ms cubic-bezier(0.4, 0, 0.2, 1) 0ms;
    }
    .fade-enter, .fade-leave-to {
        opacity: 0
    }
</style>
