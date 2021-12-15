<?php

namespace App\Http\Requests;

use App\Models\User;
use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return auth()->check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => [
                'required', 'min:3'
            ],
            'email' => [
                'required', 'email', Rule::unique((new User)->getTable())->ignore($this->route()->user->id ?? null)
            ],
            'password' => [
                $this->route()->user ? 'nullable' : 'required', 'confirmed'
            ]
        ];
    }

    public function messages()
    {
        return [
            'name.required' => '名前が必須です',
            'email.required' => 'メールアドレスが必須です',
            'password.required' => 'パスワードが必須です',
            'password.confirmed' => 'パスワードとパスワード確認が違いました',
            'password.nullable' => 'パスワードが必須です',
        ];
    }
}