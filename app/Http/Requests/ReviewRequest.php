<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ReviewRequest extends FormRequest
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
            'rating' => 'required|min:0|max:5',
            'content' => 'required|min:1'
        ];
    }

    public function messages()
    {
        return [
            'rating.required' => '星評価の点数が必須です',
            'content.required' => 'レビューのコンテンツが必須です',
        ];
    }
}