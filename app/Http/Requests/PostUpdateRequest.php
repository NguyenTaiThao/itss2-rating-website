<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PostUpdateRequest extends FormRequest
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
            'title' => 'required|min:2|max:255',
            'content' => 'required|min:2',
            'image' => 'image',
            'product_category_id' => 'required|exists:product_categories,id'
        ];
    }

    public function messages()
    {
        return [
            'title.required' => 'タイトルが必須です',
            'title.min' => 'タイトルが短すぎました',
            'content.required' => 'コンテンツが必須です',
            'content.min' => 'コンテンツが短すぎました',
            'image.image' => '選択したフィールはイメージのフォーマットじゃないです',
            'product_category_id.required' => '製品のカテゴリが必須です',
        ];
    }
}