<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateStepRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'title' => 'required | string | max:255',
            'category_ids' => 'required | array | max:3',
            'category_ids.*' => 'integer',
//            'time' => 'required | numeric | between:1,10000',
            'description' => 'required | string | max:1000',
            'step_img' => 'nullable | file | image | mimes:jpeg,png,jpg,gif | max:1024',
            'child_step.1.title' => 'required_with:child_step.1.content',
            'child_step.1.content' => 'required_with:child_step.1.title',
//            'child_step.1.time' => 'required_with:child_step.1.title,child_step.1.content',
            'child_step.1.*' => 'required',
            'child_step.*.title' => 'required_with:child_step.*.content| nullable | string ',
            'child_step.*.content' => 'required_with:child_step.*.title| nullable| string',
//            'child_step.*.time' => 'required_with:child_step.*.title,child_step.*.content| nullable | numeric | between:1,1000',
        ];

    }
    public function messages()
    {
        return [
            'step_img.max:1000' => '画像ファイルの大きさは1MB以下にしてください',
            'category_ids.required' => 'カテゴリーは選択必須です。',
            'child_step.1.*.required' => '最低１つのステップを入力してください。',
            'child_step.*.title.required_with' => 'タイトル・内容を入力してください。',
            'child_step.*.content.required_with' => 'タイトル・内容を入力してください。',
//            'child_step.*.time.required_with' => 'タイトル・内容を入力してください。',
            'child_step.*.title.string' => 'タイトル・内容を正しく入力してください。',
            'child_step.*.content.string' => 'タイトル・内容を正しく入力してください。',
//            'child_step.*.time.numeric' => 'タイトル・内容を正しく入力してください。',
//            'child_step.*.time.between' => '目安時間は1~1000時間で入力してください。',
        ];
    }
}
